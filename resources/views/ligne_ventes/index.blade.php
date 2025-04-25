@extends('layouts.app')

@section('title', 'Liste des lignes de vente')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Lignes de Vente</h1>
        <a href="{{ route('ligne_ventes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i>Ajouter une ligne
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
                            <th class="py-3">Vente</th>
                            <th class="py-3">Produit</th>
                            <th class="py-3 text-center">Qté</th>
                            <th class="py-3 text-end">Prix</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($lignesVente->count() > 0)
                            @foreach($lignesVente as $ligneVente)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle fw-bold">Vente #{{ $ligneVente->vente_id }}</td>
                                    <td class="align-middle">Prod #{{ $ligneVente->produit_id }}</td>
                                    <td class="align-middle text-center">{{ $ligneVente->quantite }}</td>
                                    <td class="align-middle text-end">{{ number_format($ligneVente->prix, 2, ',', ' ') }} €</td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('ligne_ventes.show', $ligneVente->id) }}" class="btn btn-sm btn-outline-info" title="Détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('ligne_ventes.edit', $ligneVente->id) }}" class="btn btn-sm btn-outline-warning" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ligne_ventes.destroy', $ligneVente->id) }}" method="POST" onsubmit="return confirm('Supprimer cette ligne de vente ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="fas fa-receipt fa-3x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Aucune ligne de vente trouvée</p>
                                    <a href="{{ route('ligne_ventes.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-1"></i>Créer une ligne
                                    </a>
                                </td>
                            </tr>
                        @endif
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
        .fa-receipt {
            opacity: 0.7;
        }
    </style>
@endsection
