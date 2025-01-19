<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Pour la gestion des logs

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
    public function indexAPI()
    {
        $partners = Partner::all();
        return response()->json($partners);
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
                'client' => ['required'],
                'supplier' => ['required'],
            ]);

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
                'success' => false
            ], 500);  // Code HTTP 500 pour une erreur serveur générique
        }
    }

    public function showAPI(Partner $partner)
    {
        // if ($article->user_id != auth()->id()) {
        //     return response()->json(['message' => 'Article non trouvé. L\'article a peut-être été supprimé ou est en privé', 'success' => true,], 404);
        // }
        return response()->json(['message' => 'Récupération réussit !', 'success' => false, 'data' => $partner]);
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
