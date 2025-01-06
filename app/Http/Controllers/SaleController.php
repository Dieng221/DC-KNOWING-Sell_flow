<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

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
        $request->validate([
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

        Sale::create($request->all());

        return response()->json(['message' => 'Enregistrement réussit !', 'success' => true]);
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
