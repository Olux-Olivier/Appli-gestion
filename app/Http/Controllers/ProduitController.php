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
        $produits = Produit::all();
        return view('produit.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produit::create([
            'nom' => $request->nom,
            'prix_unitaire' => $request->prix_unitaire,
            'qte_stock' => $request->qte_stock
        ]);
        return redirect()->route('produit.create')->with(['success' => 'Le produit a ete Produit ajouté avec succes !']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produit.edit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        if ($produit)
        {
            // Mettre à jour les informations
        $produit->nom = $request->nom;
        $produit->prix_unitaire = $request->prix_unitaire;
        $produit->qte_stock = $request->qte_stock;

            // Sauvegarder les modifications
        $produit->save();

            // Rediriger avec un message de succès
        return redirect()->route('produit.index')->with(['success' => 'Le produit a été mis à jour avec succès !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('produit.index')->with(['success' => 'Le produit a ete supprimer avec succes !']);
    }
}
