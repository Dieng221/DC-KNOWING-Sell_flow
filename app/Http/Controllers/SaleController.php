<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Log; // Pour la gestion des logs

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.sales.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sales.create');
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
        return view('pages.sales.show');
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
        //
    }



    // API
    public function indexAPI()
    {
        $sales = Sale::all();
        return response()->json($sales);
    }



    public function storeAPI(Request $request)
    {
        try {
            // Validation des données
            $validatedData = $request->validate([
                'partner_id' => ['required'],
                'adresse_facturation' => ['required'],
                'statut' => ['required'],
                'type_remise' => ['required'],
                'produits' => ['required'],
                'qte_produit' => ['required'],
                'date_vente' => ['required'],
                'condition_paiement' => ['required'],
                'adresse_livraison' => ['required'],
                'num_facture' => ['required'],
                'valeur_remise' => ['required'],
                'prix_unitaire' => ['required'],
            ]);

            // Créer une vente avec les données validées
            Sale::create($validatedData);

            // Retourner une réponse JSON en cas de succès
            return response()->json(['message' => 'Enregistrement réussi !', 'success' => true]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Capturer les erreurs de validation et retourner un message d'erreur
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),  // Les erreurs spécifiques de validation
                'success' => false
            ], 422);  // Code HTTP 422 pour les erreurs de validation

        } catch (\Exception $e) {
            // Log l'erreur et retourne un message générique en cas d'erreur inattendue
            Log::error('Erreur lors de la création de la vente: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'success' => false
            ], 500);  // Code HTTP 500 pour une erreur serveur générique
        }
    }


    public function showAPI(string $id)
    {
        //
    }

    public function updateAPI(Request $request, string $id)
    {
        //
    }

    public function destroyAPI(string $id)
    {
        //
    }
}
