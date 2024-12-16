<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-4">Liste des produits</h1>
    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du produit</th>
            <th scope="col">prix unitaire</th>
            <th scope="col">Quantite</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($produits as $index => $produit)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $produit->nom }}</td>
                <td>{{ $produit->prix_unitaire }}</td>
                <td>{{ $produit->qte_stock }}</td>
                <td>
                    <button class="btn btn-primary btn-sm">Modifier</button>
                    <button class="btn btn-danger btn-sm"  onclick="showModal({{ $produit->id }})" >Supprimer</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="modal-overlay" id="confirmationModal">
    <div class="modal-content">
        <h5>Confirmer la suppression</h5>
        <p>Êtes-vous sûr de vouloir supprimer ce produit ?</p>
        <div class="mt-3">
            <button class="btn btn-secondary" onclick="closeModal()">Annuler</button>
            <button class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
        </div>
    </div>
</div>
<!-- Inclure Bootstrap JS (optionnel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
            window.location.href = `/produits/${currentProductId}/delete`;
        }
    });
</script>
</body>
</html>
