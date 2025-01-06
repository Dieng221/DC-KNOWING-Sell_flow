<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Pour la gestion des logs

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.articles.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.articles.create');
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
        return view('pages.articles.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.articles.edit');
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
        $articles = Article::all();
        return response()->json($articles);
    }

    public function storeAPI(Request $request)
    {
        try {
            // Récupérer l'utilisateur connecté
            $user = Auth::user();

            // Validation des données
            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'], // Assurez-vous que `partner_id` existe dans la table `partners`
                'adresse_facturation' => ['required', 'string'],
                'statut' => ['required', 'string', 'in:en_attente,confirme,livree'], // Exemple de validation avec valeurs possibles
                'type_remise' => ['required', 'string'],
                'produits' => ['required', 'array'],
                'qte_produit' => ['required', 'array', 'min:1'], // Doit être un tableau non vide
                'date_vente' => ['required', 'date'],
                'condition_paiement' => ['required', 'string'],
                'adresse_livraison' => ['required', 'string'],
                'num_facture' => ['required', 'string', 'unique:articles,num_facture'], // Assurez-vous que le numéro de facture est unique
                'valeur_remise' => ['required', 'numeric'],
                'prix_unitaire' => ['required', 'numeric'],
            ]);

            // Ajouter l'ID de l'utilisateur connecté à la requête
            $validatedData['user_id'] = $user->id;  // On associe l'article à l'utilisateur connecté

            // Créer l'article avec les données validées
            Article::create($validatedData);

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
            Log::error('Erreur lors de la création de l\'article: ' . $e->getMessage());

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
