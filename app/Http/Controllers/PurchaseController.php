<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Article;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.purchases.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.purchases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.purchases.show');
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
        //
    }



    // API
    public function indexAPI()
    {
        $user = auth()->user();
        $purchases = $user->purchases()->with('articles')->get();
        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $purchases
        ]);
    }

    public function storeAPI(Request $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'],
                'adresse' => ['required'],
                'type_remise' => ['required'],
                'valeur_remise' => ['required', 'numeric'],
                'date_achat' => ['required', 'date'],
                'magasin_entrepot' => ['required'],
                'montant_payer' => ['required', 'numeric'],
                'articles' => ['required', 'array', 'min:1'],
                'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
                'articles.*.quantite' => ['required', 'integer', 'min:1'],
            ]);

            $validatedData['user_id'] = auth()->user()->id;  // Utilisez l'utilisateur authentifié
            $validatedData['num_ref'] = 'INV-' . date('Y-m-d') . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT) . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);

            $purchase = Purchase::create($validatedData);

            foreach ($validatedData['articles'] as $article) {
                $articleId = $article['article_id'];
                $quantite = $article['quantite'];

                $articleRecord = Article::find($articleId);
                if ($articleRecord) {
                    if ($articleRecord->quantite < $quantite) {
                        throw new \Exception("Pas assez de stock pour l'article ID: $articleId");
                    }
                    $articleRecord->quantite -= $quantite;
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
            return response()->json(['message' => 'Achat non trouvé. L\'achat a peut-être été déjà supprimé ou est en privé', 'success' => false,], 404);
        }

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $purchase
        ]);
    }

    public function updateAPI(Request $request, Purchase $purchase)
    {
        try {

            if ($purchase->user_id != auth()->id()) {
                return response()->json(['message' => 'Achat non trouvé. L\'achat a peut-être été déjà supprimé ou est en privé', 'success' => false,], 404);
            }

            // Validation des données
            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'],
                'adresse' => ['required'],
                'type_remise' => ['required'],
                'valeur_remise' => ['required', 'numeric'],
                'date_achat' => ['required', 'date'],
                'magasin_entrepot' => ['required'],
                'montant_payer' => ['required', 'numeric'],
                'articles' => ['required', 'array', 'min:1'],
                'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
                'articles.*.quantite' => ['required', 'integer', 'min:1'],
            ]);

            // Mettre à jour les données de l'achat
            $purchase->update($validatedData);  // Mettre à jour l'achat avec les données validées

            // Lier les nouveaux articles au purchase (relation many-to-many)
            $purchase->articles()->sync($validatedData['articles']);  // On utilise 'sync' pour lier les articles mis à jour

            // Retourner une réponse JSON en cas de succès
            return response()->json([
                'message' => 'Mise à jour réussie !',
                'success' => true,
                'purchase' => $purchase
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Capturer les erreurs de validation et retourner un message d'erreur
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),  // Les erreurs spécifiques de validation
                'success' => false
            ], 422);  // Code HTTP 422 pour les erreurs de validation

        } catch (\Exception $e) {
            // Log l'erreur et retourne un message générique en cas d'erreur inattendue
            Log::error('Erreur lors de la mise à jour de l\'achat: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'success' => false
            ], 500);  // Code HTTP 500 pour une erreur serveur générique
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
