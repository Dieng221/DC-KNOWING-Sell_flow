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
        $partners = Partner::all();
        return view('pages.partners.list', compact('partners'));
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
        $request->validate([
            'type_partenariat' => 'required',
            'statut' => 'required',
            'nom' => 'required',
            'contact' => 'required',
            'ligne_fixe' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',
            'adresse_livraison' => 'required',
            'numero_identification_fiscal' => 'required',
            'solde_ouverture' => 'required',
            'limite_credit' => 'required',
            'condition_paiement' => 'required',
        ]);

        $partner = new Partner();
        $partner->type_partenariat = $request->type_partenariat;
        $partner->statut = $request->statut;
        $partner->nom = $request->nom;
        $partner->contact = $request->contact;
        $partner->ligne_fixe = $request->ligne_fixe;
        $partner->email = $request->email;
        $partner->adresse = $request->adresse;
        $partner->adresse_livraison = $request->adresse_livraison;
        $partner->numero_identification_fiscal = $request->numero_identification_fiscal;
        $partner->solde_ouverture = $request->solde_ouverture;
        $partner->limite_credit = $request->limite_credit;
        $partner->condition_paiement = $request->condition_paiement;
        $partner->save();

        return redirect()->route('partners.list');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $partner = Partner::find($id);
        return view('pages.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('pages.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_partenariat' => 'required',
            'statut' => 'required',
            'nom' => 'required',
            'contact' => 'required',
            'ligne_fixe' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',
            'adresse_livraison' => 'required',
            'numero_identification_fiscal' => 'required',
            'solde_ouverture' => 'required',
            'limite_credit' => 'required',
            'condition_paiement' => 'required',
        ]);

        $partner = Partner::find($id);
        $partner->type_partenariat = $request->type_partenariat;
        $partner->statut = $request->statut;
        $partner->nom = $request->nom;
        $partner->contact = $request->contact;
        $partner->ligne_fixe = $request->ligne_fixe;
        $partner->email = $request->email;
        $partner->adresse = $request->adresse;
        $partner->adresse_livraison = $request->adresse_livraison;
        $partner->numero_identification_fiscal = $request->numero_identification_fiscal;
        $partner->solde_ouverture = $request->solde_ouverture;
        $partner->limite_credit = $request->limite_credit;
        $partner->condition_paiement = $request->condition_paiement;
        $partner->save();

        return redirect()->route('partners.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect()->route('partners.list');
    }


    // API
    public function indexAPI(Request $request)
    {
        $query = $request->query('type_partner');
        $user = auth()->user();
        $partners = null;
        if ($query == 'client') {
            $partners = $user->partners()->where('client', true)->get();
        } else if ($query == 'supplier') {
            $partners = $user->partners()->where('supplier', true)->get();
        } else {
            $partners = $user->partners()->get();
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
                'contact' => ['required'],
                'email' => ['required'],
                'client' => ['required', 'boolean'],
                'supplier' => ['required', 'boolean'],
            ]);
            $validatedData['user_id'] = auth()->id();

            // Créer un nouveau partenaire avec les données validées
            $partner = Partner::create($validatedData);

            // Retourner une réponse JSON en cas de succès
            return response()->json([
                'message' => 'Enregistrement réussi !',
                'success' => true,
                'data' => $partner,
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
            return response()->json([
                'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
                'success' => false
            ], 404);
        }
        return response()->json(['message' => 'Récupération réussit !', 'success' => false, 'data' => $partner]);
    }

    public function updateAPI(Request $request, Partner $partner)
    {
        try {
            if ($partner->user_id != auth()->id()) {
                return response()->json([
                    'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
                    'success' => false
                ], 404);
            }

            // Validation des données
            $validatedData = $request->validate([
                'nom' => ['required'],
                'ligne_fixe' => ['required'],
                'adresse' => ['required'],
                'contact' => ['required'],
                'email' => ['required'],
                'client' => ['required', 'boolean'],
                'supplier' => ['required', 'boolean'],
            ]);

            // Créer un nouveau partenaire avec les données validées
            $partner->update($validatedData);
            // Retourner une réponse JSON en cas de succès
            return response()->json([
                'message' => 'Enregistrement réussi !',
                'success' => true,
                'data' => $partner,
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
            return response()->json([
                'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
                'success' => false
            ], 404);
        }
        $partner->delete();
        return response()->json(['message' => 'Suppression réussit !', 'success' => true]);
    }

    // public function operationPartnerAPI(Partner $partner)
    // {
    //     // Vérification que l'utilisateur est bien le propriétaire du partenaire
    //     if ($partner->user_id != auth()->id()) {
    //         return response()->json([
    //             'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
    //             'success' => true,
    //         ], 404);
    //     }

    //     $user = auth()->user();

    //     // Récupération des ventes et des achats pour ce partenaire, triés par created_at (descendant)
    //     $sales = $user->sales()
    //         ->with('articles', 'partner')
    //         ->where('partner_id', $partner->id)
    //         ->orderBy('created_at', 'desc') // Tri décroissant par created_at
    //         ->get();

    //     $purchases = $user->purchases()
    //         ->with('articles', 'partner')
    //         ->where('partner_id', $partner->id)
    //         ->orderBy('created_at', 'desc') // Tri décroissant par created_at
    //         ->get();

    //     // Retourner les ventes et achats dans la même réponse
    //     return response()->json([
    //         'message' => 'Récupération réussie !',
    //         'success' => true,
    //         'data' => [
    //             'sales' => $sales,
    //             'purchases' => $purchases
    //         ]
    //     ]);
    // }

    public function operationPartnerAPI(Partner $partner)
    {
        if ($partner->user_id != auth()->id()) {
            return response()->json([
                'message' => 'Partenaire non trouvé. Le partenaire a peut-être été supprimé ou est en privé',
                'success' => false,
            ], 404);
        }
        $user = auth()->user();
        $sales = $user->sales()
            ->with('articles', 'partner')
            ->where('partner_id', $partner->id)
            ->get()
            ->map(function($sale) {
                $sale->type = 'sale';
                return $sale;
            });

        $purchases = $user->purchases()
            ->with('articles', 'partner')
            ->where('partner_id', $partner->id)
            ->get()
            ->map(function($purchase) {
                $purchase->type = 'purchase';
                return $purchase;
            });

        $merged = $sales->merge($purchases);
        $sorted = $merged->sortByDesc('created_at');
        $result = $sorted->values()->all();

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => $result
        ]);
    }

}
