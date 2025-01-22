<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Partner;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ArticlePurchase;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('pages.purchases.list', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Partner::where('type_partenariat', 'Fournisseur')->get();
        $articles = Article::all();
        return view('pages.purchases.create', compact('suppliers', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request){

    //     // Validation des données
    //     $request->validate([
    //         'partner_id' => 'required',
    //         'num_ref' => 'required|string|max:255',
    //         'adresse' => 'required|string|max:255',
    //         'magasin_entrepot' => 'required|string|max:255',
    //         'date_achat' => 'required',
    //         'type_remise' => 'nullable|string',
    //         'valeur_remise' => 'nullable|numeric|min:0',
    //         'montant_payer' => 'required|string|max:255',
    //         'products' => 'required|array',
    //         'products.*' => 'exists:articles,id', // Vérifie que chaque produit existe
    //         'quantities' => 'required|array',
    //         'quantities.*' => 'integer|min:1', // Vérifie que chaque quantité est un entier >= 1
    //         'unit_prices' => 'required|array',
    //         'unit_prices.*' => 'numeric|min:0', // Vérifie que chaque prix unitaire est >= 0
    //     ]);

    //     // Création de l'achat
    //     $purchase = Purchase::create([
    //         'partner_id' => $request->partner_id,
    //         'user_id' => 1, // Utilisateur connecté (à adapter si nécessaire)
    //         'num_ref' => $request->num_ref,
    //         'adresse' => $request->adresse,
    //         'magasin_entrepot' => $request->magasin_entrepot,
    //         'date_achat' => date('Y-m-d', strtotime($request->date_achat)),
    //         'type_remise' => $request->type_remise,
    //         'valeur_remise' => $request->valeur_remise ?? 0, // Valeur remise par défaut à 0
    //         'montant_payer' => $request->montant_payer,
    //     ]);

    //     // Association des articles à l'achat
    //     foreach ($request->products as $index => $productId) {
    //         ArticlePurchase::create([
    //             'purchase_id' => $purchase->id, // Identifiant de l'achat
    //             'article_id' => $productId, // Identifiant de l'article
    //             'quantite' => $request->quantities[$index], // Quantité correspondante
    //         ]);
    //     }

    //     // Redirection ou réponse JSON
    //     return redirect()->route('purchases.list')->with('success', 'Achat enregistré avec succès.');
    // }

    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'partner_id' => 'required',
        'num_ref' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'magasin_entrepot' => 'required|string|max:255',
        'date_achat' => 'required',
        'type_remise' => 'nullable|string',
        'valeur_remise' => 'nullable|numeric|min:0',
        'montant_payer' => 'required|string|max:255',
        'products' => 'required|array',
        'products.*' => 'exists:articles,id', // Vérifie que chaque produit existe
        'quantities' => 'required|array',
        'quantities.*' => 'integer|min:1', // Vérifie que chaque quantité est un entier >= 1
        'unit_prices' => 'required|array',
        'unit_prices.*' => 'numeric|min:0', // Vérifie que chaque prix unitaire est >= 0
    ]);

    // Création de l'achat
    $purchase = Purchase::create([
        'partner_id' => $request->partner_id,
        'user_id' => 1, // Utilisateur connecté (à adapter si nécessaire)
        'num_ref' => $request->num_ref,
        'adresse' => $request->adresse,
        'magasin_entrepot' => $request->magasin_entrepot,
        'date_achat' => date('Y-m-d', strtotime($request->date_achat)),
        'type_remise' => $request->type_remise,
        'valeur_remise' => $request->valeur_remise ?? 0, // Valeur remise par défaut à 0
        'montant_payer' => $request->montant_payer,
    ]);

    // Association des articles à l'achat avec les quantités et les prix unitaires
    foreach ($request->products as $index => $productId) {
        ArticlePurchase::create([
            'purchase_id' => $purchase->id, // Identifiant de l'achat
            'article_id' => $productId, // Identifiant de l'article
            'quantite' => $request->quantities[$index], // Quantité correspondante
        ]);
    }

    // Redirection ou réponse JSON
    return redirect()->route('purchases.list')->with('success', 'Achat enregistré avec succès.');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchase = Purchase::find($id);
        return view('pages.purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.purchases.edit');
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
        $purchase = Purchase::find($id);
        $purchase->delete();

        return redirect()->route('purchases.list');
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

        $query = $user->purchases()->with('articles', 'partner');

        if (array_key_exists($period, $periods) && $period !== 'all') {
            $query->where('created_at', '>=', $periods[$period]);
        }

        $purchases = $query->get();

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $purchases
        ]);
    }

    public function storeAPI(StorePurchaseRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            $validatedData['user_id'] = auth()->user()->id;  // Utilisez l'utilisateur authentifié
            $validatedData['num_ref'] = 'INV-' . date('Y-m-d') . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT) . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);

            if (empty($validatedData['type_remise'])) {
                unset($validatedData['type_remise']);
                unset($validatedData['valeur_remise']);
            }

            $purchase = Purchase::create($validatedData);

            foreach ($validatedData['articles'] as $article) {
                $articleId = $article['article_id'];
                $quantite = $article['quantite'];

                $articleRecord = Article::find($articleId);

                if ($articleRecord) {
                    $articleRecord->quantite += $quantite;
                    $articleRecord->save();
                }
            }

            $purchase->articles()->sync($validatedData['articles']);

            DB::commit();

            return response()->json([
                'message' => 'Enregistrement réussi !',
                'success' => true,
                'purchase' => $purchase
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
                'success' => false
            ], 422);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de l\'achat: ' . $e->getMessage());
            DB::rollBack();
            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'errors' => $e->getMessage(),
                'success' => false
            ], 500);
        }
    }


    public function showAPI(Purchase $purchase)
    {
        if ($purchase->user_id != auth()->id()) {
            return response()->json([
                'message' => 'Achat non trouvé. L\'achat a peut-être été déjà supprimé ou est en privé',
                'success' => false,
            ], 404);
        }

        $purchase->load('partner', 'articles');

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $purchase
        ]);
    }

    public function updateAPI(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        try {
            DB::beginTransaction();

            if ($purchase->user_id != auth()->id()) {
                return response()->json(['message' => 'Achat non trouvé. L\'achat a peut-être été déjà supprimé ou est en privé', 'success' => false,], 404);
            }

            $validatedData = $request->validated();

            $purchase->update($validatedData);

            foreach ($validatedData['articles'] as $article) {
                $articleId = $article['article_id'];
                $quantite = $article['quantite'];
                $articleRecord = Article::find($articleId);
                if ($articleRecord) {
                    $existingPivot = $purchase->articles()->where('article_id', $articleId)->first();
                    if ($existingPivot) {
                        $oldQuantite = $existingPivot->pivot->quantite;
                        $newQuantite = $quantite - $oldQuantite;
                        $articleRecord->quantite += $newQuantite;
                        if ($newQuantite) $articleRecord->save();
                        $purchase->articles()->updateExistingPivot($articleId, ['quantite' => $quantite]);
                    } else {
                        $purchase->articles()->attach($articleId, ['quantite' => $quantite]);
                        $articleRecord->quantite -= $quantite;
                        $articleRecord->save();
                    }
                }
            }


            DB::commit();
            return response()->json([
                'message' => 'Mise à jour réussie !',
                'success' => true,
                'purchase' => $purchase
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
                'success' => false
            ], 422);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de l\'achat: ' . $e->getMessage());
            DB::rollBack();
            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'errors' => $e->getMessage(),
                'success' => false
            ], 500);
        }
    }

    public function destroyAPI(Purchase $purchase)
    {
        if ($purchase->user_id != auth()->id()) {
            return response()->json(['message' => 'Achat non trouvé. L\'achat a peut-être été déjà supprimé ou est en privé', 'success' => false,], 404);
        }
        $purchase->delete();
        return response()->json(['message' => 'Suppression réussit !', 'success' => true]);
    }

    public function purchasePartnerAPI(Partner $partner)
    {
        if ($partner->user_id != auth()->id()) {
            return response()->json(['message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé', 'success' => true,], 404);
        }

        $user = auth()->user();
        $purchases = $user->purchases()->with('articles', 'partner')->where('partner_id', $partner->id)->get();

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $purchases
        ]);
    }
}
