<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Log; // Pour la gestion des logs

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
