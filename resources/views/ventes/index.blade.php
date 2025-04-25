@extends('layouts.app')

@section('title', 'Ventes')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Liste des Ventes</h1>
        <a href="{{ route('ventes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i>Ajouter une vente
        </a>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3">ID</th>
                            <th class="py-3">N° Vente</th>
                            <th class="py-3">Date</th>
                            <th class="py-3">N° Commande</th>
                            <th class="py-3">Paiement</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ventes as $vente)
                            <tr>
                                <td class="align-middle">{{ $vente->id }}</td>
                                <td class="align-middle fw-bold">{{ $vente->numero_vente }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($vente->date_vente)->format('d/m/Y') }}</td>
                                <td class="align-middle">{{ $vente->numero_commande ?? 'N/A' }}</td>
                                <td class="align-middle">
                                    <span class="badge bg-{{ $vente->mode_paiement === 'Espèces' ? 'success' : ($vente->mode_paiement === 'Carte' ? 'primary' : 'warning') }}">
                                        {{ $vente->mode_paiement }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('ventes.edit', $vente->id) }}" class="btn btn-sm btn-outline-warning" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('ventes.destroy', $vente->id) }}" method="POST" onsubmit="return confirm('Supprimer cette vente ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Aucune vente trouvée</p>
                                    <a href="{{ route('ventes.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-1"></i>Ajouter une vente
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .table {
            font-size: 0.925rem;
        }
        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e9ecef;
        }
        .table td, .table th {
            vertical-align: middle;
            padding: 12px 15px;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }
        .btn-sm {
            padding: 0.35rem 0.65rem;
            border-radius: 4px;
        }
        .card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
        }
        .fa-shopping-cart {
            opacity: 0.7;
        }
        .badge {
            padding: 5px 10px;
            font-weight: 500;
            min-width: 70px;
            display: inline-block;
        }
    </style>
@endsection
