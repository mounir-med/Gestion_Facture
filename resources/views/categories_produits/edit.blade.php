@extends('layouts.app')

@section('title', 'Modifier Catégorie')

@section('contents')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-edit me-2"></i>Modifier Catégorie</h3>
            <a href="{{ route('categories_produits.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('categories_produits.update', $categorieProduit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="designation" class="form-label fw-bold">Désignation</label>
                <input type="text" class="form-control form-control-lg" id="designation" name="designation"
                       value="{{ $categorieProduit->designation }}" required>
                <div class="form-text">Modifiez le nom de la catégorie</div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="reset" class="btn btn-outline-secondary">
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
        max-width: 600px;
        margin: 0 auto;
    }
    .card-header {
        padding: 1.25rem 1.5rem;
    }
    .form-control-lg {
        padding: 1rem;
        font-size: 1.1rem;
    }
    .form-label {
        margin-bottom: 0.5rem;
        display: block;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
    }
    .form-control:focus {
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
    .form-text {
        margin-top: 0.25rem;
        font-size: 0.875rem;
        color: #6c757d;
    }
</style>
@endsection
