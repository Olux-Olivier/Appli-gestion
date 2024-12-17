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
    <div class="container my-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center mx-auto" role="alert" style="width: fit-content;">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-center mb-4">Liste des produits</h1>
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom client</th>
                <th scope="col">Produit vendu</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix unitaire</th>
                <th scope="col">Total</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            
                <tr>
                    <th scope="row">1</th>
                    <td>olivier</td>
                    <td>Saucisse</td>
                    <td>4</td>
                    <td>200</td>
                    <td>800</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Modifier</button>
                        <button class="btn btn-danger btn-sm"  onclick=""> Supprimer</button>
                    </td>
                </tr>
            
            </tbody>
        </table>
    </div>

    <div class="modal-overlay" id="confirmationModal">
        <div class="modal-content">
            <h5>Confirmer la suppression</h5>
            <p>Êtes-vous sûr de vouloir supprimer cette vente ?/p>
            <div class="mt-3">
                <button class="btn btn-secondary" onclick="closeModal()">Annuler</button>
                <button class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- <script>
        let currentProductId = null;

        function showModal(productId) {
            currentProductId = productId;
            document.getElementById('confirmationModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('confirmationModal').style.display = 'none';
            currentProductId = null;
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            if (currentProductId) {
                window.location.href = `/produit-destroy/${currentProductId}`;
            }
        });
    </script> -->
@endsection