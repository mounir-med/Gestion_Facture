<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Settings::all();
        return view('about.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Settings::create($request->all());
        return redirect()->route('settings.index')->with('success', 'Settings created successfully');
    }

    // Ajoutez d'autres méthodes pour afficher, mettre à jour et supprimer les paramètres selon vos besoins
}
