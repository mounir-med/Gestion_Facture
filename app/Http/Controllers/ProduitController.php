<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\CategorieProduit;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        $categories = CategorieProduit::all();
        return view('produits.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code_produit' => 'required|string|max:255|unique:produits',
            'designation' => 'required|string|max:255',
            'type_quantite' => 'required|string|max:255',
            'prix_vente' => 'required|numeric',
            'categorie_id' => 'required|exists:categories_produits,id',
            'tva' => 'required|numeric',
        ]);

        $produit = new Produit();
        $produit->code_produit = $request->code_produit;
        $produit->designation = $request->designation;
        $produit->type_quantite = $request->type_quantite;
        $produit->prix_vente = $request->prix_vente;
        $produit->categorie_id = $request->categorie_id;
        $produit->tva = $request->tva;
        $produit->save();

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = CategorieProduit::all();
        return view('produits.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'code_produit' => 'required|string|max:255|unique:produits,code_produit,'.$id,
        'designation' => 'required|string|max:255',
        'type_quantite' => 'required|string|max:255',
        'prix_vente' => 'required|numeric',
        'categorie_id' => 'required|exists:categories_produits,id',
        'tva' => 'required|numeric',
    ]);

    $produit = Produit::findOrFail($id);
    $produit->update($request->all());

    return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès.');
}

    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
