@extends('layouts.app')

@section('title', 'Ajouter une Facture')

@section('contents')
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-gradient-primary text-white py-3">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-file-invoice me-2"></i> Nouvelle Facture
            </h3>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-semibold">
                            <i class="fas fa-user me-1 text-primary"></i> Nom du Client
                        </label>
                        <input type="text" name="name" class="form-control form-control-lg border-2" id="name"
                               placeholder="Entrez le nom du client" required>
                    </div>
                    <div class="col-md-6">
                        <label for="title" class="form-label fw-semibold">
                            <i class="fas fa-heading me-1 text-primary"></i> Titre de la Facture
                        </label>
                        <input type="text" name="title" class="form-control form-control-lg border-2" id="title"
                               placeholder="Entrez le titre" required>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <label for="quantite" class="form-label fw-semibold">
                            <i class="fas fa-cubes me-1 text-primary"></i> Quantité
                        </label>
                        <input type="number" name="quantite" class="form-control form-control-lg border-2"
                               id="quantite" placeholder="0" min="1" required>
                    </div>
                    <div class="col-md-3">
                        <label for="price_uni" class="form-label fw-semibold">
                            <i class="fas fa-euro-sign me-1 text-primary"></i> Prix Unitaire
                        </label>
                        <div class="input-group">
                            <input type="number" step="0.01" name="price_uni"
                                   class="form-control form-control-lg border-2"
                                   id="price_uni" placeholder="0.00" min="0" required>
                            <span class="input-group-text bg-light border-2">€</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="date_de_facture" class="form-label fw-semibold">
                            <i class="fas fa-calendar-day me-1 text-primary"></i> Date de Facture
                        </label>
                        <input type="date" name="date_de_facture"
                               class="form-control form-control-lg border-2"
                               id="date_de_facture" required>
                    </div>
                    <div class="col-md-3">
                        <label for="etat" class="form-label fw-semibold">
                            <i class="fas fa-credit-card me-1 text-primary"></i> Mode de Paiement
                        </label>
                        <select name="etat" class="form-select form-select-lg border-2" id="etat" required>
                            <option value="" selected disabled>Choisissez...</option>
                            <option value="Espèces">Espèces</option>
                            <option value="Carte">Carte</option>
                            <option value="Chèque">Chèque</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">
                        <i class="fas fa-align-left me-1 text-primary"></i> Description
                    </label>
                    <textarea class="form-control border-2" name="description"
                              id="description" rows="4"
                              placeholder="Détails supplémentaires..."></textarea>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-4">
                    <button type="reset" class="btn btn-outline-secondary px-4 py-2 fw-semibold">
                        <i class="fas fa-undo me-2"></i> Réinitialiser
                    </button>
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">
                        <i class="fas fa-save me-2"></i> Enregistrer la Facture
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .card {
            border: none;
            overflow: hidden;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
        }
        .card-header {
            background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
            border-bottom: none;
        }
        .form-label {
            color: #4a5568;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            transition: all 0.3s;
            font-size: 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.1);
        }
        .btn {
            transition: all 0.3s;
            border-radius: 0.5rem;
            font-size: 0.95rem;
        }
        .btn-primary {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }
        .btn-primary:hover {
            background-color: #2563eb;
            border-color: #2563eb;
            transform: translateY(-2px);
        }
        .btn-outline-secondary {
            border: 2px solid #e2e8f0;
        }
        .btn-outline-secondary:hover {
            background-color: #f8fafc;
        }
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        .input-group-text {
            background-color: #f8fafc;
            border: 2px solid #e2e8f0;
            border-left: none;
        }
        .border-2 {
            border-width: 2px !important;
        }
    </style>
@endsection
