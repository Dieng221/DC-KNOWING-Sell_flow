<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }


    // API
    public function indexAPI()
    {
        $admins = Admin::all();
        return response()->json($admins);
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

        Admin::create($request->all());

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
