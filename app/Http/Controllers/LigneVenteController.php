<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NumberFormatter;
use App\Models\LigneVente;
use App\Models\Vente;
use App\Models\Produit;

class LigneVenteController extends Controller
{


    public function index()
    {
        $lignesVente = LigneVente::all();

        foreach ($lignesVente as $ligneVente) {
            $prixHT = $ligneVente->quantite * $ligneVente->prix;
            $tva = $prixHT * 0.20; // Supposons que le taux de TVA est de 20%
            $prixTTC = $prixHT + $tva;
            $prixTTCTexte = $this->convertirEnLettres($prixTTC);
            $ligneVente->prixHT = $prixHT;
            $ligneVente->tva = $tva;
            $ligneVente->prixTTC = $prixTTC;
            $ligneVente->prixTTCTexte = $prixTTCTexte;
        }

        return view('ligne_ventes.index', compact('lignesVente'));
    }

    public function create()
{
    return view('ligne_ventes.create', [
        'ventes' => Vente::all(),
        'produits' => Produit::all()
    ]);
}

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'vente_id' => 'required|numeric',
            'produit_id' => 'required|numeric',
            'quantite' => 'required|numeric',
            'prix' => 'required|numeric',
        ]);

        // Création d'une nouvelle ligne de vente avec les données validées
        $ligneVente = new LigneVente();
        $ligneVente->vente_id = $validatedData['vente_id'];
        $ligneVente->produit_id = $validatedData['produit_id'];
        $ligneVente->quantite = $validatedData['quantite'];
        $ligneVente->prix = $validatedData['prix'];

        // Sauvegarde de la nouvelle ligne de vente
        $ligneVente->save();

        // Redirection vers la vue index avec un message de succès
        return redirect()->route('ligne_ventes.index')->with('success', 'La ligne de vente ajouté avec succès.');
    }

    public function show($id)
    {
        // Récupérer les détails de la ligne de vente avec l'ID spécifié
        $ligneVente = LigneVente::findOrFail($id);

        // Calculer le prix HT, la TVA et le prix TTC pour cette ligne de vente
        $prixHT = $ligneVente->quantite * $ligneVente->prix;
        $tva = $prixHT * 0.20; // Supposons que le taux de TVA est de 20%
        $prixTTC = $prixHT + $tva;
        $prixTTCTexte = $this->convertirEnLettres($prixTTC);

        // Ajouter ces valeurs aux détails de la ligne de vente
        $ligneVente->prixHT = $prixHT;
        $ligneVente->tva = $tva;
        $ligneVente->prixTTC = $prixTTC;
        $ligneVente->prixTTCTexte = $prixTTCTexte;

        // Passer les détails de la ligne de vente à la vue
        return view('ligne_ventes.show', compact('ligneVente'));
    }

public function convertirEnLettres($nombre)
{
    $formatter = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
    return $formatter->format($nombre);
}

public function edit($id)
{
    $ligneVente = LigneVente::with(['vente', 'produit'])->findOrFail($id);

    // Ordonner les listes de manière plus logique
    $ventes = Vente::orderBy('date_vente', 'desc')->get();
    $produits = Produit::orderBy('designation')->get();

    return view('ligne_ventes.edit', [
        'ligneVente' => $ligneVente,
        'ventes' => $ventes,
        'produits' => $produits
    ]);
}

public function update(Request $request, $id)
{
    // Validation des données
    $validatedData = $request->validate([
        'vente_id' => 'required|numeric',
        'produit_id' => 'required|numeric',
        'quantite' => 'required|numeric',
        'prix' => 'required|numeric',
    ]);

    // Récupération de la ligne de vente à mettre à jour
    $ligneVente = LigneVente::findOrFail($id);

    // Mise à jour des données de la ligne de vente avec les données validées
    $ligneVente->vente_id = $validatedData['vente_id'];
    $ligneVente->produit_id = $validatedData['produit_id'];
    $ligneVente->quantite = $validatedData['quantite'];
    $ligneVente->prix = $validatedData['prix'];

    // Sauvegarde des modifications
    $ligneVente->save();

    // Redirection vers la vue index avec un message de succès
    return redirect()->route('ligne_ventes.index')->with('success', 'La ligne de vente modifiée avec succès.');
}

public function destroy($id)
{
    // Recherche et suppression de la ligne de vente
    $ligneVente = LigneVente::findOrFail($id);
    $ligneVente->delete();

    // Redirection vers la vue index avec un message de succès
    return redirect()->route('ligne_ventes.index')->with('success', 'La ligne de vente supprimée avec succès.');
}



}
