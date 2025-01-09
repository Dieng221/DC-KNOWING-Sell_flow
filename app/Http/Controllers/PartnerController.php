<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.partners.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        return view('pages.partners.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('pages.partners.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //
    }


    // API
    public function indexAPI(Request $request)
    {
        $query = $request->query('type_partner');
        $user = auth()->user();
        $partners = null;
        if ($query == 'client') {
            // $partners = Partner::where('client', true)->get();
            $partners = $user->partners()->where('client', true)->get();
        } else if ($query == 'supplier') {
            // $partners = Partner::where('supplier', true)->get();
            $partners = $user->partners()->where('supplier', true)->get();
        } else {
            $partners = $user->partners()->get();
            // $partners = Partner::all();
        }

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $partners
        ]);
    }

    public function storeAPI(Request $request)
    {
        try {
            // Validation des données
            $validatedData = $request->validate([
                'nom' => ['required'],
                'ligne_fixe' => ['required'],
                'adresse' => ['required'],
                'numero_identification_fiscal' => ['required'],
                'limite_credit' => ['required'],
                'statut' => ['required'],
                'contact' => ['required'],
                'email' => ['required'],
                'adresse_livraison' => ['required'],
                'condition_paiement' => ['required'],
                'solde_ouverture' => ['required'],
                'client' => ['required', 'boolean'],
                'supplier' => ['required', 'boolean'],
            ]);
            $validatedData['user_id'] = auth()->id();

            // Créer un nouveau partenaire avec les données validées
            $partner = Partner::create($validatedData);

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
            Log::error('Erreur lors de la création du partenaire: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'errors' => $e->getMessage(),
                'success' => false
            ], 500);  // Code HTTP 500 pour une erreur serveur générique
        }
    }

    public function showAPI(Partner $partner)
    {
        if ($partner->user_id != auth()->id()) {
            return response()->json(['message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé', 'success' => true,], 404);
        }
        return response()->json(['message' => 'Récupération réussit !', 'success' => false, 'data' => $partner]);
    }

    public function updateAPI(Request $request, Partner $partner)
    {
        try {
            // Validation des données
            $validatedData = $request->validate([
                // 'nom' => ['required'],
                // 'ligne_fixe' => ['required'],
                // 'adresse' => ['required'],
                // 'numero_identification_fiscal' => ['required'],
                // 'limite_credit' => ['required'],
                // 'statut' => ['required'],
                // 'contact' => ['required'],
                // 'email' => ['required'],
                // 'adresse_livraison' => ['required'],
                // 'condition_paiement' => ['required'],
                // 'solde_ouverture' => ['required'],
                'client' => ['required', 'boolean'],
                'supplier' => ['required', 'boolean'],
            ]);

            // Créer un nouveau partenaire avec les données validées
            $partner->update($validatedData);
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
            Log::error('Erreur lors de la création du partenaire: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'errors' => $e->getMessage(),
                'success' => false
            ], 500);  // Code HTTP 500 pour une erreur serveur générique
        }
    }

    public function destroyAPI(Partner $partner)
    {
        if ($partner->user_id != auth()->id()) {
            return response()->json(['message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé', 'success' => true,], 404);
        }
        $partner->delete();
        return response()->json(['message' => 'Suppression réussit !', 'success' => true]);
    }
}
