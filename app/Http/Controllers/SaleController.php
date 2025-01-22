<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Article;
use App\Models\Partner;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\ArticleSale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        return view('pages.sales.list', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Partner::where('type_partenariat', 'Client')->get();
        $articles = Article::all();
        return view('pages.sales.create', compact('clients', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'num_facture' => 'required|string|max:255',
            'adresse_facturation' => 'required|string|max:255',
            'adresse_livraison' => 'required|string|max:255',
            'montant_payer' => 'required|numeric|min:0',
            'date_vente' => 'required|date',
            'type_remise' => 'nullable|string|in:Montant fixe,Pourcentage',
            'valeur_remise' => 'nullable|numeric|min:0',
            'products' => 'required|array',
            'products.*' => 'exists:articles,id', // Vérifie que chaque produit existe
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1', // Vérifie que chaque quantité est un entier >= 1
        ]);

        // Création de la vente
        $sale = Sale::create([
            'partner_id' => $request->partner_id,
            'user_id' => 1, // Utilisateur connecté
            'adresse_facturation' => $request->adresse_facturation,
            'adresse_livraison' => $request->adresse_livraison,
            'num_facture' => $request->num_facture,
            'montant_payer' => $request->montant_payer,
            'date_vente' => $request->date_vente,
            'type_remise' => $request->type_remise,
            'valeur_remise' => $request->valeur_remise ?? 0, // Valeur remise par défaut à 0
        ]);

        // Association des articles à la vente
        foreach ($request->products as $index => $productId) {
            ArticleSale::create([
                'sale_id' => $sale->id, // Identifiant de la vente
                'article_id' => $productId, // Identifiant de l'article
                'quantite' => $request->quantities[$index], // Quantité correspondante
            ]);
        }

        // Redirection ou réponse JSON
        return redirect()->route('sales.list')->with('success', 'Vente enregistrée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::find($id);
        return view('pages.sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.sales.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale = Sale::find($id);
        $sale->delete();

        return redirect()->route('sales.list');
    }



    // API
    public function indexAPI(Request $request)
    {
        $user = auth()->user();
        $period = $request->query('period', 'all');

        $periods = [
            'day' => Carbon::now()->subHours(24),
            'week' => Carbon::now()->subDays(7),
            'month' => Carbon::now()->subMonth(),
            'quarter' => Carbon::now()->subMonths(3),
            'half' => Carbon::now()->subMonths(6),
            'year' => Carbon::now()->subYear(),
            'all' => null,
        ];

        $query = $user->sales()->with('articles', 'partner');

        if (array_key_exists($period, $periods) && $period !== 'all') {
            $query->where('created_at', '>=', $periods[$period]);
        }

        $sales = $query->get();

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $sales
        ]);
    }

    public function storeAPI(Request $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'],
                'montant_payer' => ['required', 'numeric'],
                'date_vente' => ['required', 'date'],
                'type_remise' => ['nullable', 'string'],
                'valeur_remise' => ['nullable', 'numeric'],
                'articles' => ['required', 'array', 'min:1'],
                'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
                'articles.*.quantite' => ['required', 'integer', 'min:1'],
            ]);

            $validatedData['num_facture'] = 'INV-' . date('Y-m-d') . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT) . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);
            $validatedData['user_id'] = auth()->id();

            $sale = Sale::create($validatedData);

            foreach ($validatedData['articles'] as $article) {
                $articleId = $article['article_id'];
                $quantite = $article['quantite'];

                $articleRecord = Article::find($articleId);
                if ($articleRecord) {
                    if ($articleRecord->quantite - $quantite < 0) {
                        throw new \Exception("Pas assez de stock pour l'article ID: $articleId");
                    }
                    $articleRecord->quantite -= $quantite;
                    $articleRecord->save();
                }
            }

            $sale->articles()->sync($validatedData['articles']);

            DB::commit();

            return response()->json([
                'message' => 'Vente enregistrée avec succès!',
                'success' => true,
                'data' => $sale,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
                'success' => false
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'enregistrement de la vente: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'errors' => $e->getMessage(),
                'success' => false
            ], 500);
        }
    }

    public function showAPI(Sale $sale)
    {
        return response()->json([
            'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
            'success' => false
        ], 404);
        $sale->load('partner', 'articles');

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $sale
        ]);
    }

    public function updateAPI(Request $request, Sale $sale)
    {
        try {
            return response()->json([
                'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
                'success' => false
            ], 404);

            DB::beginTransaction();

            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'],
                'montant_payer' => ['required', 'numeric'],
                'date_vente' => ['required', 'date'],
                'type_remise' => ['nullable', 'string'],
                'valeur_remise' => ['nullable', 'numeric'],
                'articles' => ['required', 'array', 'min:1'],
                'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
                'articles.*.quantite' => ['required', 'integer', 'min:1'],
            ]);
            $sale->update($validatedData);
            foreach ($validatedData['articles'] as $article) {
                $articleId = $article['article_id'];
                $quantite = $article['quantite'];
                $articleRecord = Article::find($articleId);
                if ($articleRecord) {
                    $existingPivot = $sale->articles()->where('article_id', $articleId)->first();
                    if ($existingPivot) {
                        $oldQuantite = $existingPivot->pivot->quantite;
                        $newQuantite = $quantite - $oldQuantite;
                        $articleRecord->quantite += $newQuantite;
                        if ($articleRecord->quantite < 0) {
                            throw new \Exception("Pas assez de stock pour l'article ID: $articleId");
                        }
                        if ($newQuantite) $articleRecord->save();
                        $sale->articles()->updateExistingPivot($articleId, ['quantite' => $quantite]);
                    } else {
                        $articleRecord->quantite -= $quantite;
                        if ($articleRecord->quantite < 0) {
                            throw new \Exception("Pas assez de stock pour l'article ID: $articleId");
                        }
                        $articleRecord->save();
                        $sale->articles()->attach($articleId, ['quantite' => $quantite]);
                    }
                }
            }
            DB::commit();
            return response()->json([
                'message' => 'Mise à jour réussie !',
                'success' => true,
                'data' => $sale
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
                'success' => false
            ], 422);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la vente: ' . $e->getMessage());
            DB::rollBack();
            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'errors' => $e->getMessage(),
                'success' => false
            ], 500);
        }
    }

    public function destroyAPI(Sale $sale)
    {
        return response()->json([
            'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
            'success' => false
        ], 404);
        $sale->delete();
        return response()->json(['message' => 'Suppression réussit !', 'success' => true]);
    }

    public function salePartnerAPI(Partner $partner)
    {
        if ($partner->user_id != auth()->id()) {
            return response()->json([
                'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
                'success' => false
            ], 404);
        }

        $user = auth()->user();
        $sales = $user->sales()->with('articles', 'partner')->where('partner_id', $partner->id)->get();

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $sales
        ]);
    }
}
