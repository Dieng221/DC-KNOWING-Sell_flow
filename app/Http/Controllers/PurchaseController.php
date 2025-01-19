<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Partner;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\ArticlePurchase;
use Illuminate\Support\Facades\Log; // Pour la gestion des logs

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
    public function indexAPI()
    {
        $user = Auth::user();
        $purchases = $user->purchases;
        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $purchases
        ]);
    }

    public function storeAPI(Request $request)
    {
        try {
            // Validation des données
            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'],
                'adresse' => ['required'],
                'type_remise' => ['required'],
                'valeur_remise' => ['required', 'numeric'],
                'date_vente' => ['required', 'date'],
                'magasin_entrepot' => ['required'],
                'montant_payer' => ['required', 'numeric'],
                'articles' => ['required', 'array', 'min:1'],
                'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
                'articles.*.quantite' => ['required', 'integer', 'min:1'],
            ]);

            // Ajouter l'ID de l'utilisateur
            $validatedData['user_id'] = auth()->user()->id;  // Utilisez l'utilisateur authentifié

            // Générer le numéro de facture
            $validatedData['num_ref'] = 'INV-' . date('Y-m-d') . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);

            // Créer un achat avec les données validées
            $purchase = Purchase::create($validatedData);

            // Lier les articles au purchase (relation many-to-many)
            $purchase->articles()->sync($validatedData['articles']);  // On utilise 'sync' pour lier les articles

            // Retourner une réponse JSON en cas de succès
            return response()->json([
                'message' => 'Enregistrement réussi !',
                'success' => true,
                'purchase' => $purchase  // Vous pouvez aussi renvoyer les données de l'achat
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
            Log::error('Erreur lors de la création de l\'achat: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'success' => false
            ], 500);  // Code HTTP 500 pour une erreur serveur générique
        }
    }


    public function showAPI(Purchase $purchase)
    {
        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'purchase' => $purchase
        ]);
    }

    public function updateAPI(Request $request, Purchase $purchase)
    {
        try {
            // Validation des données
            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'],
                'adresse' => ['required'],
                'type_remise' => ['required'],
                'valeur_remise' => ['required', 'numeric'],
                'date_vente' => ['required', 'date'],
                'magasin_entrepot' => ['required'],
                'montant_payer' => ['required', 'numeric'],
                'articles' => ['required', 'array', 'min:1'],
                'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
                'articles.*.quantite' => ['required', 'integer', 'min:1'],
            ]);

            // // Rechercher l'achat existant par ID
            // $purchase = Purchase::findOrFail($id);  // Si l'achat n'existe pas, cela lancera une erreur 404

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
        //
    }
}
