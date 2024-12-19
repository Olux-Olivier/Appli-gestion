<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function statistiques(){
        $produits = Vente::select('produit_id', DB::raw('COUNT(*) as total_ventes'))
            ->groupBy('produit_id')
            ->orderByDesc('total_ventes')
            ->get();
        return view('produit.statistiques', compact('produits'));
    }
}
