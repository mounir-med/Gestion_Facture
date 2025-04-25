<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;

class VenteController extends Controller
{
    /**
     * Display a listing of the ventes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventes = Vente::all();
        return view('ventes.index', compact('ventes'));
    }

    /**
     * Show the form for creating a new vente.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventes.create');
    }

    /**
     * Store a newly created vente in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données entrées par l'utilisateur
        $request->validate([
            'numero_vente' => 'required|string|max:255',
            'date_vente' => 'required|date',
            'numero_commande' => 'required|string|max:255',
            'mode_paiement' => 'required|string|in:Carte,Espèces,Chèque',
        ]);

        // Création d'une nouvelle vente avec les données validées
        Vente::create($request->all());

        return redirect()->route('ventes.index')->with('success', 'Vente ajoutée avec succès.');
    }

    /**
     * Show the form for editing the specified vente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vente = Vente::findOrFail($id);
        return view('ventes.edit', compact('vente'));
    }

    /**
     * Update the specified vente in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation des données entrées par l'utilisateur
        $request->validate([
            'numero_vente' => 'required|string|max:255',
            'date_vente' => 'required|date',
            'numero_commande' => 'required|string|max:255',
            'mode_paiement' => 'required|string|in:Carte,Espèces,Chèque',
        ]);

        // Recherche de la vente à mettre à jour
        $vente = Vente::findOrFail($id);

        // Mise à jour des données de la vente
        $vente->update($request->all());

        return redirect()->route('ventes.index')->with('success', 'Vente modifiée avec succès.');
    }

    /**
     * Remove the specified vente from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche de la vente à supprimer
        $vente = Vente::findOrFail($id);

        // Suppression de la vente
        $vente->delete();

        return redirect()->route('ventes.index')->with('success', 'Vente supprimée avec succès.');
    }
}
