@extends('layouts.app')

@section('title', 'Ajouter un Client')

@section('contents')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Nouveau Client</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="code_client" class="form-label fw-bold">Code Client</label>
                        <input type="text" name="code_client" class="form-control" id="code_client"
                               placeholder="Entrez le code client" required>
                    </div>
                    <div class="col-md-6">
                        <label for="raison_sociale" class="form-label fw-bold">Raison Sociale</label>
                        <input type="text" name="raison_sociale" class="form-control" id="raison_sociale"
                               placeholder="Entrez la raison sociale" required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="adresse" class="form-label fw-bold">Adresse</label>
                        <input type="text" name="adresse" class="form-control" id="adresse"
                               placeholder="Entrez l'adresse complète" required>
                    </div>
                    <div class="col-md-3">
                        <label for="code_postal" class="form-label fw-bold">Code Postal</label>
                        <input type="text" name="code_postal" class="form-control" id="code_postal"
                               placeholder="Code postal" required>
                    </div>
                    <div class="col-md-3">
                        <label for="telephone" class="form-label fw-bold">Téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text">+212</span>
                            <input type="tel" name="telephone" class="form-control" id="telephone"
                                   placeholder="6XXXXXXXX" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="ice" class="form-label fw-bold">ICE</label>
                        <input type="text" name="ice" class="form-control" id="ice"
                               placeholder="Entrez l'Identifiant Commun de l'Entreprise" required>
                        <small class="text-muted">15 chiffres</small>
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
        .form-control {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            border: 1px solid #ced4da;
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
        .input-group-text {
            background-color: #f8f9fa;
        }
    </style>
@endsection
