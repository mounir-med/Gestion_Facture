@extends('layouts.app')

@section('title', 'Ajouter une Catégorie')

@section('contents')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="fas fa-tags me-2"></i>Nouvelle Catégorie</h3>
                <a href="{{ route('categories_produits.index') }}" class="btn btn-light">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('categories_produits.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="designation" class="form-label fw-bold">Désignation de la Catégorie</label>
                    <input type="text" class="form-control" id="designation" name="designation"
                           placeholder="Ex: Électronique, Alimentaire, etc." required>
                    <div class="form-text">Entrez un nom clair et descriptif pour la catégorie</div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">
                        <i class="fas fa-undo me-1"></i> Effacer
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Créer Catégorie
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
        .form-label {
            margin-bottom: 0.5rem;
            display: block;
        }
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            font-size: 1rem;
        }
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .btn {
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
        }
        .form-text {
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
@endsection
