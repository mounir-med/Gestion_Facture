@extends('layouts.app')

@section('title', 'Détails Ligne de Vente')

@section('contents')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-file-invoice me-2"></i>Détails Ligne de Vente #{{ $ligneVente->id }}</h3>
            <a href="{{ route('ligne_ventes.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-item mb-4">
                    <h5 class="detail-title">Informations de base</h5>
                    <div class="detail-content">
                        <p><strong>Vente associée :</strong> #{{ $ligneVente->vente->numero_vente ?? 'N/A' }}</p>
                        <p><strong>Produit :</strong> {{ $ligneVente->produit->designation ?? 'N/A' }}</p>
                        <p><strong>Quantité :</strong> {{ $ligneVente->quantite }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-item mb-4">
                    <h5 class="detail-title">Informations financières</h5>
                    <div class="detail-content">
                        <p><strong>Prix HT :</strong> {{ number_format($ligneVente->prixHT, 2, ',', ' ') }} €</p>
                        <p><strong>TVA :</strong> {{ $ligneVente->tva }}%</p>
                        <p><strong>Prix TTC :</strong> {{ number_format($ligneVente->prixTTC, 2, ',', ' ') }} €</p>
                        <p><strong>Montant en lettres :</strong> "{{ $ligneVente->prixTTCTexte }}"</p>
                    </div>
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
    .detail-item {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 1.25rem;
    }
    .detail-title {
        color: #0d6efd;
        font-weight: 600;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 0.5rem;
        margin-bottom: 1rem;
    }
    .detail-content p {
        margin-bottom: 0.5rem;
    }
    .btn {
        border-radius: 8px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
    }
</style>
@endsection
