<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }


    // API
    public function indexAPI()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
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

        Supplier::create($request->all());

        return response()->json('Enregistrement réussit !');
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
