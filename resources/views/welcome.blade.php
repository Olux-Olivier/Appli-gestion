<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord des Ventes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .dashboard {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .card-icon {
            font-size: 40px;
            color: #007bff;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 20px; /* Bord arrondi */
            padding: 10px 15px; /* Ajout de padding */
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: white; /* Fond blanc au survol */
            color: #6c757d; /* Texte gris */
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class="sidebar p-4">
            <h2>
                <i class="fas fa-drumstick-bite"></i> Boucherie TROIS R.
            </h2>
            <ul class="list-unstyled mt-4">
                <li><a href="#" class="btn btn-link">Ajouter un Produit</a></li>
                <li><a href="#" class="btn btn-link">Enregistrer une Vente</a></li>
                <li><a href="#" class="btn btn-link">Voir les Produits</a></li>
                <li><a href="#" class="btn btn-link">Voir les Ventes</a></li>
                <li><a href="#" class="btn btn-link">Statistiques</a></li>
            </ul>
        </div>

        <div class="container dashboard flex-grow-1">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="text-center">Tableau de Bord des Ventes</h1>
                <button class="btn btn-danger logout-btn">Déconnexion</button>
            </div>

            <div class="row mt-4">
                <!-- Produits enregistrés -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-box card-icon"></i>
                            <h5 class="card-title">Produits Enregistrés</h5>
                            <p class="card-text">Voir la liste des produits enregistrés avec leurs détails.</p>
                            <a href="#" class="btn btn-primary">Voir les Produits</a>
                        </div>
                    </div>
                </div>

                <!-- Ventes réalisées par jour -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-calendar-day card-icon"></i>
                            <h5 class="card-title">Ventes par Jour</h5>
                            <p class="card-text">Détails des ventes réalisées par jour.</p>
                            <a href="#" class="btn btn-primary">Voir les Ventes</a>
                        </div>
                    </div>
                </div>

                <!-- Statistiques de ventes -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line card-icon"></i>
                            <h5 class="card-title">Statistiques de Ventes</h5>
                            <p class="card-text">Nombre de ventes par jour, semaine et mois.</p>
                            <a href="#" class="btn btn-primary">Voir les Statistiques</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Produit le plus vendu -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-star card-icon"></i>
                            <h5 class="card-title">Produit le Plus Vendue</h5>
                            <p class="card-text">Voir le produit le plus vendu par période.</p>
                            <a href="#" class="btn btn-primary">Voir le Produit</a>
                        </div>
                    </div>
                </div>

                <!-- Produit le moins vendu -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-frown card-icon"></i>
                            <h5 class="card-title">Produit le Moins Vendue</h5>
                            <p class="card-text">Voir le produit le moins vendu par période.</p>
                            <a href="#" class="btn btn-primary">Voir le Produit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>