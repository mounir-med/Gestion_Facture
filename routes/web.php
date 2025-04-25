<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ActivityLogController;

Route::get('/', function () {
    return view('profile');
});

Route::prefix('auth')->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerSave'])->name('register.save');

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginAction'])->name('login.action');

    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('products')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('products.index');
        Route::get('create', [ProductController::class, 'create'])->name('products.create');
        Route::post('store', [ProductController::class, 'store'])->name('products.store');
        Route::get('show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('edit/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    Route::prefix('about')->group(function () {
        Route::get('', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('create', [SettingsController::class, 'create'])->name('settings.create');
        Route::post('store', [SettingsController::class, 'store'])->name('settings.store');
        // Ajoutez d'autres routes pour afficher, mettre à jour et supprimer les paramètres
    });
});

Route::get('/generate-pdf', [ProductController::class, 'generatePdf'])->name('generate.pdf');
Route::get('/contact', [ActivityLogController::class, 'index'])->name('contact.index');

// Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// ***************************************************************
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategorieProduitController;
use App\Http\Controllers\LigneVenteController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VenteController;

// Routes pour les clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');

Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

// Routes pour les produits

// Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
// Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
// Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
// Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
// Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
// Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');

Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');

Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');

Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');


// Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');

// Routes pour les ventes
Route::get('/ventes', [VenteController::class, 'index'])->name('ventes.index');
Route::get('/ventes/create', [VenteController::class, 'create'])->name('ventes.create');
Route::post('/ventes', [VenteController::class, 'store'])->name('ventes.store');
Route::get('/ventes/{vente}', [VenteController::class, 'show'])->name('ventes.show');
Route::get('/ventes/{vente}/edit', [VenteController::class, 'edit'])->name('ventes.edit');
Route::put('/ventes/{vente}', [VenteController::class, 'update'])->name('ventes.update');
Route::delete('/ventes/{vente}', [VenteController::class, 'destroy'])->name('ventes.destroy');

// Routes pour les lignes de vente
Route::get('/ligne-ventes', [LigneVenteController::class, 'index'])->name('ligne_ventes.index');
Route::get('/ligne-ventes/create', [LigneVenteController::class, 'create'])->name('ligne_ventes.create');
Route::post('/ligne-ventes', [LigneVenteController::class, 'store'])->name('ligne_ventes.store');
Route::get('/ligne-ventes/{ligneVente}', [LigneVenteController::class, 'show'])->name('ligne_ventes.show');
Route::get('/ligne-ventes/{ligneVente}/edit', [LigneVenteController::class, 'edit'])->name('ligne_ventes.edit');
// Route::put('/ligne-ventes/{ligneVente}', [LigneVenteController::class, 'update'])->name('ligne_ventes.update');

Route::put('/ligne-ventes/{ligneVente}', [LigneVenteController::class, 'update'])->name('ligne_ventes.update');

Route::delete('/ligne-ventes/{ligneVente}', [LigneVenteController::class, 'destroy'])->name('ligne_ventes.destroy');

// Routes pour les catégories de produits
Route::get('/categories-produits', [CategorieProduitController::class, 'index'])->name('categories_produits.index');
Route::get('/categories-produits/create', [CategorieProduitController::class, 'create'])->name('categories_produits.create');
Route::post('/categories-produits', [CategorieProduitController::class, 'store'])->name('categories_produits.store');
Route::get('/categories-produits/{categorieProduit}', [CategorieProduitController::class, 'show'])->name('categories_produits.show');
// Route::get('/categories-produits/{categorieProduit}/edit', [CategorieProduitController::class, 'edit'])->name('categories_produits.edit');
// Route::get('/categories-produits/{categorieProduit}/edit', [CategorieProduitController::class, 'edit'])->name('categories_produits.edit');
Route::get('/categories-produits/{categorieProduit}/edit', [CategorieProduitController::class, 'edit'])->name('categories_produits.edit');


// Route::put('/categories-produits/{categorieProduit}', [CategorieProduitController::class, 'update'])->name('categories_produits.update');
Route::put('/categories-produits/{id}', [CategorieProduitController::class, 'update'])->name('categories_produits.update');

// Route::delete('/categories-produits/{categorieProduit}', [CategorieProduitController::class, 'destroy'])->name('categories_produits.destroy');
Route::delete('/categories-produits/{categorieProduit}', [CategorieProduitController::class, 'destroy'])->name('categories_produits.destroy');


