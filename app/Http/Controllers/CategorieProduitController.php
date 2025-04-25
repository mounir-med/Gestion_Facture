<?php

namespace App\Http\Controllers;

use App\Models\CategorieProduit;
use Illuminate\Http\Request;

class CategorieProduitController extends Controller
{
    public function index()
    {
        $categories = CategorieProduit::all();
        return view('categories_produits.index', compact('categories'));
    }

    public function create()
    {
        return view('categories_produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|max:255',
        ]);

        CategorieProduit::create($request->all());

        return redirect()->route('categories_produits.index')->with('success', 'Catégorie de produit ajoutée avec succès.');
    }

    public function edit($id)
    {
        $categorieProduit = CategorieProduit::findOrFail($id);
        return view('categories_produits.edit', compact('categorieProduit'));
    }




    public function update(Request $request, $id)
    {
        $categorieProduit = CategorieProduit::findOrFail($id);
        $categorieProduit->update($request->all());
        // Redirection avec un message de succès
        return redirect()->route('categories_produits.index')->with('success', 'Catégorie de produit modifié avec succès.');
    }

    public function destroy(CategorieProduit $categorie_produit)
    {
        $categorie_produit->delete();

        return redirect()->route('categories_produits.index')->with('success', 'Catégorie de produit supprimée avec succès.');
    }
}
