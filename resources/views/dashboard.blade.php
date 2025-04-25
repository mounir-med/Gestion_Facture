@extends('layouts.app')

@section('title', 'Tableau de Bord - Administration')

@section('contents')
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="welcome-card p-4 rounded-3 shadow-sm bg-white">
                <h1 class="display-5 fw-bold text-primary mb-3">Tableau de Bord</h1>
                <p class="fs-5 text-muted">Bienvenue sur votre panneau d'administration. Vous pouvez gérer l'ensemble de votre activité depuis cette interface.</p>
                <div class="border-bottom my-3"></div>
                <p class="mb-0">Explorez les différentes sections pour gérer vos utilisateurs, produits, commandes et factures.</p>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card stat-card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small">Utilisateurs</h6>
                            <h2 class="mb-0">1,258</h2>
                        </div>
                        <i class="fas fa-users fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stat-card bg-success text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small">Factures</h6>
                            <h2 class="mb-0">4,302</h2>
                        </div>
                        <i class="fas fa-file-invoice fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stat-card bg-warning text-dark shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small">Commandes</h6>
                            <h2 class="mb-0">2,415</h2>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stat-card bg-info text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small">Produits</h6>
                            <h2 class="mb-0">3,847</h2>
                        </div>
                        <i class="fas fa-boxes fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Cards -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card management-card h-100 shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0"><i class="fas fa-users-cog me-2"></i>Gestion des Utilisateurs</h3>
                </div>
                <div class="card-body">
                    <p>Gérez les comptes utilisateurs, les rôles et les permissions. Créez, modifiez ou archivez les profils.</p>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Utilisateurs actifs
                            <span class="badge bg-primary rounded-pill">1,024</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Administrateurs
                            <span class="badge bg-primary rounded-pill">12</span>
                        </li>
                    </ul>
                    <div class="d-grid">
                        <a href="{{route('profile')}}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-right me-1"></i> Accéder
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card management-card h-100 shadow">
                <div class="card-header bg-success text-white">
                    <h3 class="h5 mb-0"><i class="fas fa-file-invoice-dollar me-2"></i>Gestion des Factures</h3>
                </div>
                <div class="card-body">
                    <p>Gérez l'ensemble des factures, consultez les statistiques et exportez les données financières.</p>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Factures ce mois
                            <span class="badge bg-success rounded-pill">342</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            En attente de paiement
                            <span class="badge bg-warning rounded-pill">28</span>
                        </li>
                    </ul>
                    <div class="d-grid">
                        <a href="{{route('products.index')}}" class="btn btn-outline-success">
                            <i class="fas fa-arrow-right me-1"></i> Accéder
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Power BI -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h3 class="h5 mb-0"><i class="fas fa-chart-line me-2"></i>Analytiques Power BI</h3>
                    <small class="text-white-50">Données en temps réel de votre activité</small>
                </div>
                <div class="card-body p-0" style="height: 600px;">
                    <!-- Remplacez cette URL par celle de votre rapport Power BI -->
                    <iframe
                        src="https://app.powerbi.com/reportEmbed?reportId=VOTRE_ID_RAPPORT&groupId=VOTRE_ID_GROUPE"
                        frameborder="0"
                        style="width: 100%; height: 100%;"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-muted">Dernière mise à jour: {{ now()->format('d/m/Y H:i') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .welcome-card {
        background-color: #f8f9fa;
        border-left: 4px solid #0d6efd;
    }
    .stat-card {
        border-radius: 10px;
        transition: transform 0.2s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
    .management-card {
        border-radius: 10px;
        border: none;
        transition: box-shadow 0.3s;
    }
    .management-card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .management-card .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    .list-group-item {
        border-radius: 5px !important;
        margin-bottom: 5px;
    }
    #powerbi-container {
        min-height: 500px;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 5px;
    }
</style>

<!-- Script pour Power BI (optionnel) -->
<script src="https://npmcdn.com/es6-promise@3.2.1"></script>
<script src="https://npmcdn.com/powerbi-client@2.4.7/dist/powerbi.min.js"></script>
<script>
    // Vous pouvez ajouter ici des interactions supplémentaires avec Power BI
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Tableau de bord Power BI chargé');
    });
</script>
@endsection
