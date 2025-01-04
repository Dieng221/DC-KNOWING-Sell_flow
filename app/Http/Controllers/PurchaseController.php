<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

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

    public function storeAPI(Request $request)
    {
        $request->validate([
            'partner_id' => ['required'],
            'num_ref' => ['required'],
            'adresse' => ['required'],
            'type_remise' => ['required'],
            'produits' => ['required'],
            'qte_produit' => ['required'],
            'date_vente' => ['required'],
            'condition_paiement' => ['required'],
            'magasin_entrepot' => ['required'],
            'valeur_remise' => ['required'],
            'prix_unitaire' => ['required'],
        ]);

       Sale::create($request->all());

        return response()->json('Enregistrement réussit !');
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
}
