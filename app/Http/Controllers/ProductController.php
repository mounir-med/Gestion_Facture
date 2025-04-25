<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF; // Assurez-vous d'importer la classe PDF

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'quantite' => 'required|numeric',
            'price_uni' => 'required|numeric',
            'date_de_facture' => 'required|date',
            'description' => 'nullable',
            'etat' => 'required',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Facture ajoutée avec succès');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $data = $request->all();

    // Convertir le format français (699,00) en format décimal (699.00)
    if (isset($data['price_uni'])) {
        $data['price_uni'] = str_replace(',', '.', $data['price_uni']);
    }

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Facture modifiée avec succès');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Facture supprimée avec succès');
    }

    /**
     * Generate PDF of product list.
     */
    public function generatePdf()
    {
        $products = Product::all();
        $pdf = PDF::loadView('pdf.product_list', compact('products'));
        return $pdf->download('product_list.pdf');
    }
}
