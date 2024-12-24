@extends('base')
@section('styles')
    <style>
        .animated-container {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-table {
            opacity: 0;
            animation: fadeIn 0.5s forwards;
            animation-delay: 0.2s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .animated-row {
            opacity: 0;
            transform: translateY(10px);
            animation: slideIn 0.5s forwards;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes modalFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .scrollable-table-container {
            max-height: 600px; /* Adjust height as needed */
            overflow-y: auto;
            border: 1px solid #ddd; /* Optional for better visuals */
            border-radius: 5px;
        }

        .scrollable-table-container::-webkit-scrollbar {
            width: 8px; /* Customize scrollbar width */
        }

        .scrollable-table-container::-webkit-scrollbar-thumb {
            background-color: #888; /* Customize scrollbar color */
            border-radius: 5px;
        }

        .scrollable-table-container::-webkit-scrollbar-thumb:hover {
            background-color: #ffffff; /* Customize hover color */
        }

        .modal-overlay {
            display: none; /* Masquer par défaut */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            padding: 250px;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            transform: translateY(-20px);
            opacity: 0;
            text-align: center;
            animation: modalFadeIn 0.5s forwards;
        }

    </style>
@endsection

@section('content')
<div class="container my-4 animated-container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center mx-auto" role="alert" style="width: fit-content;">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center mb-4">Ventes du jour</h1>
        <div class="scrollable-table-container">
            <table class="table table-striped animated-table">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom client</th>
                    <th scope="col">Produit vendu</th>
                    <th scope="col">Quantité (Kg)</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php $index = 0; @endphp
                @foreach($ventesGrouped as $codeVente => $produits)
                    @php
                        $rowCount = count($produits);
                        $firstProduit = $produits->first();
                    @endphp
                    @foreach($produits as $produit)
                        <tr class="animated-row">
                            @if ($loop->first)
                                <th scope="row" rowspan="{{ $rowCount }}">{{ ++$index }}</th>
                                <td rowspan="{{ $rowCount }}">{{ $firstProduit->nomclient }}</td>
                            @endif
                            <td>{{ $produit->nom_produit }}</td>
                            <td>{{ $produit->qte }} Kg</td>
                            <td>{{ number_format($produit->prix_unitaire, 2, ',', ' ') }} CDF</td>
                            <td>{{ number_format($produit->prix_total, 2, ',', ' ') }} CDF</td>
                            @if ($loop->first)
                                <td rowspan="{{ $rowCount }}">

                                    <button class="btn btn-danger btn-sm" onclick="showModal({{ $produit->id }})">Supprimer</button>
                                    <form class="d-inline" action="{{route('vente.imprimer',['vente' => $produit->id])}}" method="get">
                                        <button class="btn btn-primary btn-sm">Imprimer</button>
                                    </form>

                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>

</div>
<div class="modal-overlay" id="confirmationModal">
    <div class="modal-content animated-modal">
        <h5>Confirmer la suppression</h5>
        <p>Êtes-vous sûr de vouloir supprimer cette vente ?</p>
        <div class="mt-3">
            <button class="btn btn-secondary" onclick="closeModal()">Annuler</button>
            <button class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
    function closeModal() {
    document.getElementById('confirmationModal').style.display = 'none';
    }

    let currentProductId = null;

    function showModal(productId) {
        document.getElementById('confirmationModal').style.display = 'flex';
        currentProductId = productId;

        document.getElementById('confirmationModal').style.display = 'flex';
    }

    // function closeModal() {
    //     document.getElementById('confirmationModal').style.display = 'none';
    //     currentProductId = null;
    // }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        console.log(currentProductId)
        if (currentProductId) {

        window.location.href = `/vente-destroy/${currentProductId}`;
    }
    });
    </script>
@endsection
