@extends('layouts.app')

@section('title', 'Modifier Vente')

@section('contents')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-edit me-2"></i>Modifier Vente #{{ $vente->numero_vente }}</h3>
            <a href="{{ route('ventes.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('ventes.update', $vente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="numero_vente" class="form-label fw-bold">Numéro de Vente</label>
                    <input type="text" class="form-control" id="numero_vente" name="numero_vente"
                           value="{{ $vente->numero_vente }}" required>
                </div>
                <div class="col-md-6">
                    <label for="date_vente" class="form-label fw-bold">Date de Vente</label>
                    <input type="date" class="form-control" id="date_vente" name="date_vente"
                           value="{{ $vente->date_vente }}" required>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="numero_commande" class="form-label fw-bold">Numéro de Commande</label>
                    <input type="text" class="form-control" id="numero_commande" name="numero_commande"
                           value="{{ $vente->numero_commande }}" required>
                </div>
                <div class="col-md-6">
                    <label for="mode_paiement" class="form-label fw-bold">Mode de Paiement</label>
                    <select class="form-select" id="mode_paiement" name="mode_paiement" required>
                        <option value="Carte" {{ $vente->mode_paiement == 'Carte' ? 'selected' : '' }}>Carte Bancaire</option>
                        <option value="Espèces" {{ $vente->mode_paiement == 'Espèces' ? 'selected' : '' }}>Espèces</option>
                        <option value="Chèque" {{ $vente->mode_paiement == 'Chèque' ? 'selected' : '' }}>Chèque</option>
                        {{-- <option value="Virement" {{ $vente->mode_paiement == 'Virement' ? 'selected' : '' }}>Virement Bancaire</option> --}}
                    </select>
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
</style>
@endsection
