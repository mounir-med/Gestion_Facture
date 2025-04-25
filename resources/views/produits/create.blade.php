@extends('layouts.app')

@section('title', 'Ajouter un Produit')

@section('contents')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-box me-2"></i>Nouveau Produit</h3>
            <a href="{{ route('produits.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Code Produit</label>
                    <input type="text" name="code_produit" class="form-control"
                           placeholder="Ex: PROD-001" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold">Désignation</label>
                    <input type="text" name="designation" class="form-control"
                           placeholder="Nom du produit" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Type de Quantité</label>
                    <select name="type_quantite" class="form-select" required>
                        <option value="" selected disabled>Choisir...</option>
                        <option value="kg">Kilogramme (kg)</option>
                        <option value="unite">Unité</option>
                        <option value="kg_et_unite">Kilogramme et Unité</option>
                    </select>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Prix de Vente</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="prix_vente" class="form-control"
                               placeholder="0.00" min="0" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Catégorie</label>
                    <select name="categorie_id" class="form-select" required>
                        <option value="" selected disabled>Sélectionner...</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->designation }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">TVA (%)</label>
                    <div class="input-group">
                        <input type="number" step="0.1" name="tva" class="form-control"
                               placeholder="0.0" min="0" max="100" required>
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="reset" class="btn btn-outline-secondary me-md-2">
                    <i class="fas fa-undo me-1"></i> Réinitialiser
                </button>
                <button type="submit" class="btn btn-primary">
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
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .btn {
        border-radius: 8px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
    }
    .input-group-text {
        background-color: #f8f9fa;
    }
</style>
@endsection
