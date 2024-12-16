<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produit.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produit::create([
            'nom' => $request->nom,
            'prix_unitaire'=> $request->prix_unitaire,
            'qte_stock' => $request-> qte_stock
        ]);
        return redirect()->route('produit.index')->with(['success' => 'Le produit a ete Produit ajouté avec succes !']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $produits = Produit::all();
        return view('produit.show', compact('produits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
