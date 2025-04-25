@extends('layouts.app')

@section('title', 'Liste des Clients')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Liste des Clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i>Ajouter un Client
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
                            {{-- <th class="py-3">ID</th> --}}
                            <th class="py-3">Code Client</th>
                            <th class="py-3">Adresse</th>
                            <th class="py-3">Téléphone</th>
                            <th class="py-3">Code Postal</th>
                            <th class="py-3">ICE</th>
                            <th class="py-3">Raison Sociale</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clients as $client)
                            <tr>
                                {{-- <td class="align-middle">{{ $client->id }}</td> --}}
                                <td class="align-middle fw-bold">{{ $client->code_client }}</td>
                                <td class="align-middle">{{ $client->adresse }}</td>
                                <td class="align-middle">{{ $client->telephone }}</td>
                                <td class="align-middle">{{ $client->code_postal }}</td>
                                <td class="align-middle">{{ $client->ice }}</td>
                                <td class="align-middle">{{ $client->raison_sociale }}</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('clients.edit', $client->id)}}" class="btn btn-sm btn-outline-warning" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Supprimer ce client ?')">
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
                                <td colspan="8" class="text-center py-5">
                                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Aucun client trouvé</p>
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
        .fa-users {
            opacity: 0.7;
        }
    </style>
@endsection
