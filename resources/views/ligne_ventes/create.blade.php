@extends('layouts.app')

@section('title', 'Créer Ligne de Vente')

@section('contents')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-receipt me-2"></i>Nouvelle Ligne de Vente</h3>
            <a href="{{ route('ligne_ventes.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('ligne_ventes.store') }}" method="POST">
            @csrf

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="vente_id" class="form-label fw-bold">Vente</label>
                    <select name="vente_id" id="vente_id" class="form-select" required>
                        <option value="" selected disabled>Sélectionner une vente</option>
                        @foreach($ventes as $vente)
                            <option value="{{ $vente->id }}">Vente #{{ $vente->numero_vente }} - {{ $vente->date_vente }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="produit_id" class="form-label fw-bold">Produit</label>
                    <select name="produit_id" id="produit_id" class="form-select" required>
                        <option value="" selected disabled>Sélectionner un produit</option>
                        @foreach($produits as $produit)
                            <option value="{{ $produit->id }}">{{ $produit->designation }} ({{ $produit->code_produit }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="quantite" class="form-label fw-bold">Quantité</label>
                    <input type="number" name="quantite" id="quantite" class="form-control"
                           min="1" step="1" placeholder="1" required>
                </div>
                <div class="col-md-6">
                    <label for="prix" class="form-label fw-bold">Prix Unitaire</label>
                    <div class="input-group">
                        <input type="number" name="prix" id="prix" class="form-control"
                               min="0" step="0.01" placeholder="0.00" required>
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="reset" class="btn btn-outline-secondary me-md-2">
                    <i class="fas fa-undo me-1"></i> Réinitialiser
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-1"></i> Ajouter Ligne
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
        max-width: 800px;
        margin: 0 auto;
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
        padding: 0.75rem 1rem;
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
