@extends('layouts.app')

@section('title', 'Liste des Catégories de Produits')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Liste des Catégories</h1>
        <a href="{{ route('categories_produits.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i>Ajouter une catégorie
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
                            <th class="py-3">Désignation</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($categories->count() > 0)
                            @foreach($categories as $categorie)
                                <tr>
                                    <td class="align-middle">{{ $categorie->id }}</td>
                                    <td class="align-middle fw-bold">{{ $categorie->designation }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('categories_produits.edit', $categorie->id) }}" class="btn btn-sm btn-outline-warning" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories_produits.destroy', $categorie->id) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')">
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
                                <td colspan="3" class="text-center py-5">
                                    <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Aucune catégorie trouvée</p>
                                    <a href="{{ route('categories_produits.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-1"></i>Créer une catégorie
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
        .fa-tags {
            opacity: 0.7;
        }
    </style>
@endsection
