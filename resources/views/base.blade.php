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
    @yield('styles')
</head>

<body>
<div class="d-flex">
    <div class="sidebar p-4">
        <h2>
            <i class="fas fa-drumstick-bite"></i> Boucherie TROIS R.
        </h2>
        <ul class="list-unstyled mt-4">
            <li class="mt-2"><a href="{{ route('produit.create') }}" class="btn ">Ajouter un Produit</a></li>
            <li class="mt-2"><a href="{{ route('vente.create')}}" class="btn ">Enregistrer une Vente</a></li>
            <li class="mt-2"><a href="{{ route('produit.index') }}" class="btn">Voir les Produits</a></li>
            <li class="mt-2"><a href="#" class="btn ">Voir les Ventes</a></li>
            <li class="mt-2"><a href="/" class="btn ">Tableau de bord</a></li>
        </ul>
    </div>

    <div class="container dashboard flex-grow-1">
        @yield('content')
    </div>
</div>

@yield('scripts')

</body>

</html>
