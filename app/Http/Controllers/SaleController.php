<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Article;
use App\Models\Partner;
use App\Models\ArticleSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Pour la gestion des logs

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
    public function indexAPI()
    {
        $sales = Sale::with(['articles', 'partner'])->where('user_id', auth()->id())->get();
        return response()->json($sales);
    }

    public function storeAPI(Request $request)
    {
        try {
            // Validation des données
            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'],
                'adresse_facturation' => ['required', 'string'],
                'montant_payer' => ['required', 'numeric'],
                'date_vente' => ['required', 'date'],
                'type_remise' => ['nullable', 'string'],
                'valeur_remise' => ['nullable', 'numeric'],
                'adresse_livraison' => ['required', 'string'],
                'articles' => ['required', 'array', 'min:1'],
                'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
                'articles.*.quantite' => ['required', 'integer', 'min:1'],
            ]);

            // Générer un numéro de facture unique
            $validatedData['num_facture'] = 'INV-' . date('Y-m-d') . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);
            $validatedData['user_id'] = auth()->id();

            // Créer la vente avec les données validées
            $sale = Sale::create($validatedData);
            $sale->articles()->sync($validatedData['articles']);
            // Retourner une réponse JSON en cas de succès
            return response()->json([
                'message' => 'Vente enregistrée avec succès!',
                'success' => true,
                'sale' => $sale,  // Vous pouvez aussi renvoyer les données de la vente
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
            Log::error('Erreur lors de l\'enregistrement de la vente: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'success' => false
            ], 500);  // Code HTTP 500 pour une erreur serveur générique
        }
    }

    public function showAPI(Sale $sale)
    {
        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'purchase' => $sale
        ]);
    }

    public function updateAPI(Request $request, Sale $sale)
    {
        try {
            // Validation des données
            $validatedData = $request->validate([
                'partner_id' => ['required', 'exists:partners,id'],
                'adresse_facturation' => ['required', 'string'],
                'montant_payer' => ['required', 'numeric'],
                'date_vente' => ['required', 'date'],
                'type_remise' => ['nullable', 'string'],
                'valeur_remise' => ['nullable', 'numeric'],
                'adresse_livraison' => ['required', 'string'],
                'articles' => ['required', 'array', 'min:1'],
                'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
                'articles.*.quantite' => ['required', 'integer', 'min:1'],
            ]);

            // // Rechercher l'achat existant par ID
            // $sale = Sale::findOrFail($id);  // Si l'achat n'existe pas, cela lancera une erreur 404

            // Mettre à jour les données de l'achat
            $sale->update($validatedData);  // Mettre à jour l'achat avec les données validées

            // Lier les nouveaux articles au purchase (relation many-to-many)
            $sale->articles()->sync($validatedData['articles']);  // On utilise 'sync' pour lier les articles mis à jour

            // Retourner une réponse JSON en cas de succès
            return response()->json([
                'message' => 'Mise à jour réussie !',
                'success' => true,
                'purchase' => $sale
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
            Log::error('Erreur lors de la mise à jour de la vente: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'success' => false
            ], 500);  // Code HTTP 500 pour une erreur serveur générique
        }
    }

    public function destroyAPI(Sale $sale)
    {
        //
    }
}
