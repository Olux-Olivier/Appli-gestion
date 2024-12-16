<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Ajout de Produit</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .form-container {
            width: 30%;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="text-center">Ajouter un Produit</h2>
        <form>
            <div class="form-group">
                <label for="productName">Nom du Produit</label>
                <input type="text" class="form-control" id="productName" placeholder="Entrez le nom du produit" required>
            </div>
            <div class="form-group">
                <label for="unitPrice">Prix Unitaire (par kg)</label>
                <input type="number" class="form-control" id="unitPrice" placeholder="Entrez le prix unitaire" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantité à Mettre en Stock</label>
                <input type="number" class="form-control" id="quantity" placeholder="Entrez la quantité" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le Produit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>