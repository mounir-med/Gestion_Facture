@extends('layouts.app')

@section('title', 'Facture')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Votre Facture</h1>
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-primary me-2">
                <i class="fas fa-plus-circle me-1"></i>Ajouter
            </a>
            <a href="{{ route('generate.pdf') }}" class="btn btn-light ml-2">
                <i class="fas fa-file-pdf"></i> Exporter PDF
            </a>
        </div>
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
                            <th class="py-3">#</th>
                            <th class="py-3">Client</th>
                            <th class="py-3">Produit</th>
                            <th class="py-3 text-center">Qté</th>
                            <th class="py-3 text-end">Prix U.</th>
                            <th class="py-3 text-end">Total</th>
                            <th class="py-3">Date</th>
                            <th class="py-3">Statut</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($products->count() > 0)
                            @foreach($products as $product)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $product->name }}</td>
                                    <td class="align-middle">{{ $product->title }}</td>
                                    <td class="align-middle text-center">{{ $product->quantite }}</td>
                                    <td class="align-middle text-end">{{ number_format($product->price_uni, 2, ',', ' ') }} €</td>
                                    <td class="align-middle text-end fw-bold">{{ number_format($product->price_total, 2, ',', ' ') }} €</td>
                                    <td class="align-middle">{{ $product->date_de_facture }}</td>
                                    <td class="align-middle">
                                        <span class="badge rounded-pill bg-{{ $product->etat === 'payé' ? 'success' : 'warning' }}">
                                            {{ $product->etat }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->id)}}" class="btn btn-sm btn-outline-warning" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
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
                                <td colspan="9" class="text-center py-5">
                                    <i class="fas fa-file-invoice fa-3x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Aucune facture trouvée</p>
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
        .badge {
            padding: 5px 10px;
            font-weight: 500;
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
    </style>
@endsection
