@extends('base')
@section('styles')
    <style>
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1050;
            display: none;
            padding: 250px;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
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
            <h1 class="mb-4">Statistiques des produits</h1>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nom du Produit</th>
                    <th>Total Ventes</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($produits as $key => $produit)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $produit->produit->nom ?? 'N/A' }}</td> <!-- Assurez-vous que la colonne 'nom' existe dans le modèle Produit -->
                        <td>{{ $produit->total_ventes }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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

        .btn-primary,
        .btn-danger {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            transform: scale(1.05); /* Agrandissement léger au survol */
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
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            transform: translateY(-20px);
            opacity: 0;
            animation: modalFadeIn 0.5s forwards;
        }

        @keyframes modalFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


@endsection

@section('scripts')
    <script>
        function showModal() {
            document.getElementById('confirmationModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        //SCRIPTS ACTIONS
        // let currentProductId = null;

        // function showModal(productId) {
        //     currentProductId = productId;
        //     document.getElementById('confirmationModal').style.display = 'flex';
        // }

        // function closeModal() {
        //     document.getElementById('confirmationModal').style.display = 'none';
        //     currentProductId = null;
        // }

        // document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        //     if (currentProductId) {
        //         window.location.href = `/produit-destroy/${currentProductId}`;
        //     }
        // });
    </script>
@endsection
