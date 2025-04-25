@extends('layouts.app')

@section('title', 'Modifier Facture')

@section('contents')
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="fas fa-file-invoice me-2"></i>Modifier la Facture #{{ $product->id }}</h3>
                <a href="{{ route('products.index') }}" class="btn btn-light">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nom du Client</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Nom complet du client" value="{{ $product->name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Référence Facture</label>
                        <input type="text" name="title" class="form-control"
                               placeholder="Référence/N° Facture" value="{{ $product->title }}" required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Quantité</label>
                        <input type="number" name="quantite" class="form-control"
                               placeholder="0" value="{{ $product->quantite }}" min="1" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Prix Unitaire</label>
                        <div class="input-group">
                            <input type="number" step="0.01" name="price_uni" class="form-control"
                                   placeholder="0.00" value="{{ $product->price_uni }}" min="0" required>
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Prix Total</label>
                        <div class="input-group">
                            <input type="number" step="0.01" name="price_total" class="form-control"
                                   placeholder="0.00" value="{{ $product->price_total }}" min="0" required>
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Date Facture</label>
                        <input type="date" name="date_de_facture" class="form-control"
                               value="{{ $product->date_de_facture }}" required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Mode de Paiement</label>
                        <select class="form-select" name="etat" required>
                            <option value="Espèces" {{ $product->etat == 'Espèces' ? 'selected' : '' }}>Espèces</option>
                            <option value="Carte" {{ $product->etat == 'Carte' ? 'selected' : '' }}>Carte Bancaire</option>
                            <option value="Chèque" {{ $product->etat == 'Chèque' ? 'selected' : '' }}>Chèque</option>
                            <option value="Virement" {{ $product->etat == 'Virement' ? 'selected' : '' }}>Virement Bancaire</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Description</label>
                    <textarea class="form-control" name="description" rows="3"
                              placeholder="Détails supplémentaires...">{{ $product->description }}</textarea>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">
                        <i class="fas fa-undo me-1"></i> Réinitialiser
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-1"></i> Mettre à jour
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
        textarea {
            min-height: 100px;
        }
    </style>
@endsection
