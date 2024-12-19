@extends('base')
@section('content')
<div class="container dashboard flex-grow-1">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-center">Tableau de Bord</h1>
        <a href="{{route('logout')}}" class="btn btn-danger logout-btn">Déconnexion</a>
    </div>

    <div class="row mt-4">
        <!-- Produits enregistrés -->
        <div class="col-md-4">
            <div class="card text-center animated-card">
                <div class="card-body">
                    <i class="fas fa-box card-icon" style="font-size: 50px; color: #007bff;"></i>
                    <h5 class="card-title">Produits Enregistrés</h5>
                    <p class="card-text">Liste des produits enregistrés avec leurs détails.</p>
                    <a href="{{ route('produit.index') }}" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>

        <!-- Ventes réalisées par jour -->
        <div class="col-md-4">
            <div class="card text-center animated-card">
                <div class="card-body">
                    <i class="fas fa-calendar-day card-icon" style="font-size: 50px; color: #007bff;"></i>
                    <h5 class="card-title">Ventes par Jour</h5>
                    <p class="card-text">Les détails de toutes les ventes réalisées par jour.</p>
                    <a href="{{route('vente.index')}}" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>

        <!-- Statistiques de ventes -->
        <div class="col-md-4">
            <div class="card text-center animated-card">
                <div class="card-body">
                    <i class="fas fa-chart-line card-icon" style="font-size: 50px; color: #007bff;"></i>
                    <h5 class="card-title">Statistiques de Ventes</h5>
                    <p class="card-text">Nombre et Total de ventes par jour, semaine et mois.</p>
                    <a href="{{ route('vente.statistiques')}}" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Produit le plus vendu -->
        <div class="col-md-4">
            <div class="card text-center animated-card">
                <div class="card-body">
                    <i class="fas fa-star card-icon" style="font-size: 50px; color: #007bff;"></i>
                    <h5 class="card-title">Statistiques produits</h5>
                    <p class="card-text">Les produits les plus vendus et les moins vendus.</p>
                    <a href="{{route('produit.statistiques')}}" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>

        <!-- Produit le moins vendu -->

    </div>
</div>

<style>
    .animated-card {
        opacity: 0;
        transform: translateY(20px);
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .animated-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 20px rgba(0, 123, 255, 0.5);
    }

    /* Animation au chargement */
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Appliquer l'animation au chargement */
    .animated-card:nth-child(1) {
        animation: fadeInUp 0.5s forwards;
        animation-delay: 0.1s;
    }
    .animated-card:nth-child(2) {
        animation: fadeInUp 0.5s forwards;
        animation-delay: 0.3s;
    }
    .animated-card:nth-child(3) {
        animation: fadeInUp 0.5s forwards;
        animation-delay: 0.5s;
    }
    .animated-card:nth-child(4) {
        animation: fadeInUp 0.5s forwards;
        animation-delay: 0.7s;
    }
    .animated-card:nth-child(5) {
        animation: fadeInUp 0.5s forwards;
        animation-delay: 0.9s;
    }
</style>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
