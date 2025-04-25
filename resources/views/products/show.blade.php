@extends('layouts.app')

@section('title', 'Détail Facture')

@section('contents')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Détails de la Facture</h3>
                <a href="{{ route('products.index') }}" class="btn btn-light">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Client</label>
                    <div class="form-control-plaintext bg-light p-3 rounded">
                        {{ $product->name }}
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Titre</label>
                    <div class="form-control-plaintext bg-light p-3 rounded">
                        {{ $product->title }}
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Quantité</label>
                    <div class="form-control-plaintext bg-light p-3 rounded text-center">
                        {{ $product->quantite }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Prix Unitaire</label>
                    <div class="form-control-plaintext bg-light p-3 rounded text-end">
                        {{ number_format($product->price_uni, 2, ',', ' ') }} €
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Total</label>
                    <div class="form-control-plaintext bg-light p-3 rounded text-end fw-bold">
                        {{ number_format($product->price_total, 2, ',', ' ') }} €
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Date Facture</label>
                    <div class="form-control-plaintext bg-light p-3 rounded text-center">
                        {{ \Carbon\Carbon::parse($product->date_de_facture)->format('d/m/Y') }}
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Mode de Paiement</label>
                    <div class="form-control-plaintext bg-light p-3 rounded">
                        <span class="badge bg-{{ $product->etat === 'payé' ? 'success' : ($product->etat === 'impayé' ? 'danger' : 'warning') }}">
                            {{ $product->etat }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Description</label>
                <div class="form-control-plaintext bg-light p-3 rounded" style="min-height: 100px">
                    {{ $product->description ?? 'Aucune description' }}
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Créée le</label>
                    <div class="form-control-plaintext bg-light p-3 rounded">
                        {{ $product->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Modifiée le</label>
                    <div class="form-control-plaintext bg-light p-3 rounded">
                        {{ $product->updated_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>
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
        .form-control-plaintext {
            border: 1px solid #f0f0f0;
        }
        .badge {
            font-size: 0.9em;
            padding: 5px 12px;
            border-radius: 50px;
        }
    </style>
@endsection
