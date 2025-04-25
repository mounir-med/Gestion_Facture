@extends('layouts.app')

@section('title', 'Modifier Ligne de Vente')

@section('contents')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-edit me-2"></i>Modifier Ligne de Vente #{{ $ligneVente->id }}</h3>
            <a href="{{ route('ligne_ventes.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('ligne_ventes.update', $ligneVente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Vente associée</label>
                    <select name="vente_id" class="form-select" required>
                        @foreach($ventes as $vente)
                            <option value="{{ $vente->id }}" {{ $ligneVente->vente_id == $vente->id ? 'selected' : '' }}>
                                Vente #{{ $vente->numero_vente }} ({{ $vente->date_vente }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Produit</label>
                    <select name="produit_id" class="form-select" required>
                        @foreach($produits as $produit)
                            <option value="{{ $produit->id }}" {{ $ligneVente->produit_id == $produit->id ? 'selected' : '' }}>
                                {{ $produit->designation }} ({{ $produit->code_produit }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Quantité</label>
                    <input type="number" name="quantite" class="form-control"
                           value="{{ $ligneVente->quantite }}" min="1" step="1" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Prix Unitaire</label>
                    <div class="input-group">
                        <input type="number" name="prix" class="form-control"
                               value="{{ $ligneVente->prix }}" min="0" step="0.01" required>
                        <span class="input-group-text">€</span>
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
