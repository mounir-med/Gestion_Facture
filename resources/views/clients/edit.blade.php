@extends('layouts.app')

@section('title', 'Modifier Client')

@section('contents')
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Modification du Client</h3>
                <a href="{{ route('clients.index') }}" class="btn btn-light">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Code Client</label>
                        <input type="text" name="code_client" class="form-control"
                               placeholder="Code client" value="{{ $client->code_client }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Raison Sociale</label>
                        <input type="text" name="raison_sociale" class="form-control"
                               placeholder="Raison sociale" value="{{ $client->raison_sociale }}" required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <label class="form-label fw-bold">Adresse</label>
                        <input type="text" name="adresse" class="form-control"
                               placeholder="Adresse complète" value="{{ $client->adresse }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Code Postal</label>
                        <input type="text" name="code_postal" class="form-control"
                               placeholder="Code postal" value="{{ $client->code_postal }}" required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text">+212</span>
                            <input type="tel" name="telephone" class="form-control"
                                   placeholder="6XXXXXXXX" value="{{ $client->telephone }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">ICE</label>
                        <input type="text" name="ice" class="form-control"
                               placeholder="Identifiant Commun Entreprise" value="{{ $client->ice }}" required>
                        <small class="text-muted">15 chiffres</small>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
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
        .form-control {
            border-radius: 8px;
            padding: 0.5rem 1rem;
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
        .input-group-text {
            background-color: #f8f9fa;
        }
    </style>
@endsection
