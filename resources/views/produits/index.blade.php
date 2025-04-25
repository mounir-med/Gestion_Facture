@extends('layouts.app')

@section('title', 'Produits')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Liste des Produits</h1>
        <a href="{{ route('produits.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i>Ajouter un produit
        </a>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Modal pour le scanner -->
    <div class="modal fade" id="barcodeScannerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Scanner un code-barres</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="barcode-scanner" style="width: 100%; height: 300px; border: 2px dashed #ccc;"></div>
                    <div id="scanner-result" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3">ID</th>
                            <th class="py-3">Code</th>
                            <th class="py-3">Désignation</th>
                            <th class="py-3">Type</th>
                            <th class="py-3 text-end">Prix Vente</th>
                            <th class="py-3">Catégorie</th>
                            <th class="py-3 text-center">TVA</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produits as $produit)
                            <tr data-product-id="{{ $produit->id }}" data-product-code="{{ $produit->code_produit }}">
                                <td class="align-middle">{{ $produit->id }}</td>
                                <td class="align-middle fw-bold">{{ $produit->code_produit }}</td>
                                <td class="align-middle">{{ $produit->designation }}</td>
                                <td class="align-middle">{{ $produit->type_quantite }}</td>
                                <td class="align-middle text-end">{{ number_format($produit->prix_vente, 2, ',', ' ') }} €</td>
                                <td class="align-middle">{{ $produit->categorie->designation ?? 'N/A' }}</td>
                                <td class="align-middle text-center">{{ $produit->tva }}%</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm btn-outline-info show-barcode"
                                                data-bs-toggle="modal"
                                                data-bs-target="#barcodeModal"
                                                data-code="{{ $produit->code_produit }}"
                                                title="Afficher code-barres">
                                            <i class="fas fa-barcode"></i>
                                        </button>
                                        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-outline-warning" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')">
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
                                    <i class="fas fa-boxes fa-3x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Aucun produit trouvé</p>
                                    <a href="{{ route('produits.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus-circle me-1"></i>Ajouter un produit
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal pour afficher le code-barres -->
    <div class="modal fade" id="barcodeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Code-barres</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <svg id="modal-barcode" class="barcode-svg mb-3"></svg>
                    <button id="scanThisBarcode" class="btn btn-success w-100">
                        <i class="fas fa-barcode me-1"></i>Scanner ce code
                    </button>
                </div>
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
        .fa-boxes {
            opacity: 0.7;
        }
        .barcode-svg {
            height: 80px;
            width: 100%;
            display: block;
            margin: 0 auto;
            background: white;
        }
    </style>

    <!-- Inclure les bibliothèques nécessaires -->
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion de l'affichage du code-barres dans le modal
            const barcodeModal = new bootstrap.Modal(document.getElementById('barcodeModal'));
            const showBarcodeButtons = document.querySelectorAll('.show-barcode');

            showBarcodeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const code = this.getAttribute('data-code');
                    JsBarcode("#modal-barcode", code, {
                        format: "CODE128",
                        lineColor: "#000",
                        width: 2,
                        height: 60,
                        displayValue: true,
                        fontSize: 14,
                        margin: 10
                    });
                });
            });

            // Scanner le code affiché
            document.getElementById('scanThisBarcode').addEventListener('click', function() {
                const barcodeModal = bootstrap.Modal.getInstance(document.getElementById('barcodeModal'));
                barcodeModal.hide();

                // Simuler la détection du code
                const code = document.querySelector('#modal-barcode').getAttribute('data-barcode');
                findProductByBarcode(code);
            });

            // Configurer le scanner global
            const scannerModal = new bootstrap.Modal(document.getElementById('barcodeScannerModal'));
            const resultDiv = document.getElementById('scanner-result');

            function findProductByBarcode(code) {
                const productRow = document.querySelector(`tr[data-product-code="${code}"]`);

                if (productRow) {
                    productRow.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    productRow.style.backgroundColor = 'rgba(25, 135, 84, 0.1)';
                    setTimeout(() => {
                        productRow.style.backgroundColor = '';
                    }, 3000);
                } else {
                    alert('Produit non trouvé avec le code: ' + code);
                }
            }

            // Initialiser Quagga pour le scanner
            function initScanner() {
                Quagga.init({
                    inputStream: {
                        name: "Live",
                        type: "LiveStream",
                        target: document.querySelector('#barcode-scanner'),
                        constraints: {
                            width: 480,
                            height: 320,
                            facingMode: "environment"
                        },
                    },
                    decoder: {
                        readers: ["ean_reader", "ean_8_reader", "code_128_reader", "code_39_reader", "code_39_vin_reader"]
                    },
                }, function(err) {
                    if (err) {
                        console.error(err);
                        resultDiv.innerHTML = '<div class="alert alert-danger">Erreur d\'initialisation du scanner: ' + err + '</div>';
                        return;
                    }
                    Quagga.start();
                });

                Quagga.onDetected(function(result) {
                    const code = result.codeResult.code;
                    Quagga.stop();
                    scannerModal.hide();
                    findProductByBarcode(code);
                });
            }

            // Nettoyer quand le modal est fermé
            document.getElementById('barcodeScannerModal').addEventListener('hidden.bs.modal', function() {
                if (Quagga) {
                    Quagga.stop();
                }
            });
        });
    </script>
@endsection
