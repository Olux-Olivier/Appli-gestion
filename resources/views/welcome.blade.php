@extends('base')
@section('content')
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
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
