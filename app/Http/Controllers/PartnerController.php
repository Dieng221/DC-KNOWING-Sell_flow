<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
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
        $request->validate([
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

        $partner = Partner::create($request->all());

        return response()->json('Enregistrement réussit !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
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
    public function indexAPI()
    {
        $partners = Partner::all();
        return response()->json($partners);
    }

    public function storeAPI(Request $request)
    {
        $request->validate([
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

        $partner = Partner::create($request->all());

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
