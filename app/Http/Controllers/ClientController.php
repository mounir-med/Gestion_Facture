<?php

// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Méthode pour afficher la liste des clients
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Méthode pour afficher le formulaire de création d'un client
    public function create()
    {
        return view('clients.create');
    }

    // Méthode pour enregistrer un nouveau client
    public function store(Request $request)
    {
        $request->validate([
            'code_client' => 'required|unique:clients',
            'adresse' => 'nullable',
            'telephone' => 'nullable',
            'code_postal' => 'nullable',
            'ice' => 'nullable|numeric',
            'raison_sociale' => 'nullable',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès');
    }

    // Méthode pour afficher le formulaire de modification d'un client
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    // Méthode pour mettre à jour les informations d'un client
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client modifiée avec succès');
    }


    // Méthode pour supprimer un client
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès');
    }
    // Dans votre contrôleur

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.index', compact('client'));
    }

}
