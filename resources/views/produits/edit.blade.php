@extends('layouts.app')

@section('title', 'Modifier Produit')

@section('contents')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-edit me-2"></i>Modifier Produit #{{ $produit->code_produit }}</h3>
            <a href="{{ route('produits.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Code Produit</label>
                    <input type="text" name="code_produit" class="form-control"
                           value="{{ $produit->code_produit }}" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold">Désignation</label>
                    <input type="text" name="designation" class="form-control"
                           value="{{ $produit->designation }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Type de Quantité</label>
                    <select name="type_quantite" class="form-select" required>
                        <option value="kg" {{ $produit->type_quantite == 'kg' ? 'selected' : '' }}>Kilogramme (kg)</option>
                        <option value="unite" {{ $produit->type_quantite == 'unite' ? 'selected' : '' }}>Unité</option>
                        <option value="kg_et_unite" {{ $produit->type_quantite == 'kg_et_unite' ? 'selected' : '' }}>Kilogramme et Unité</option>
                    </select>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Prix de Vente</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="prix_vente" class="form-control"
                               value="{{ $produit->prix_vente }}" min="0" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Catégorie</label>
                    <select name="categorie_id" class="form-select" required>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->designation }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">TVA (%)</label>
                    <div class="input-group">
                        <input type="number" step="0.1" name="tva" class="form-control"
                               value="{{ $produit->tva }}" min="0" max="100" required>
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="reset" class="btn btn-outline-secondary me-md-2">
                    <i class="fas fa-undo me-1"></i> Réinitialiser
                </button>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save me-1"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }
    .card-header {
        padding: 1.25rem 1.5rem;
    }
    .form-label {
        margin-bottom: 0.5rem;
        display: block;
    }
    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.5rem 1rem;
        border: 1px solid #ced4da;
    }
    .form-control:focus, .form-select:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }
    .input-group-text {
        background-color: #f8f9fa;
    }
</style>
@endsection
