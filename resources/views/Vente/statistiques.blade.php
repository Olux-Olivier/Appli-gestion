@extends('base')
@section('content')
<div class="container dashboard flex-grow-1">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-center">Statistiques des ventes</h1>
        <a href="{{route('logout')}}" class="btn btn-danger logout-btn">Déconnexion</a>
    </div>

    <div class="row mt-4">
        <!-- Rubrique Aujourd'hui -->
        <div class="col-md-4">
            <div class="card text-center animated-card">
                <div class="card-body">
                    <i class="fas fa-clock card-icon" style="font-size: 50px; color: #007bff;"></i>
                    <h5 class="card-title">Aujourd'hui</h5>
                    <ul class="list-unstyled">
                        <li>Ventes (Factures) : {{ $nombre_vente }}</li>
                        <li>Montant total : {{ $montant_jour}} CDF</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Rubrique Cette Semaine -->
        <div class="col-md-4">
            <div class="card text-center animated-card">
                <div class="card-body">
                    <i class="fas fa-calendar-week card-icon" style="font-size: 50px; color: #007bff;"></i>
                    <h5 class="card-title">Cette Semaine</h5>
                    <ul class="list-unstyled">
                        <li>Ventes : {{$nombreVenteSemaine}}</li>
                        <li>Montant total : {{$montant_semaine}} CDF</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Rubrique Ce Mois -->
        <div class="col-md-4">
            <div class="card text-center animated-card">
                <div class="card-body">
                    <i class="fas fa-calendar-alt card-icon" style="font-size: 50px; color: #007bff;"></i>
                    <h5 class="card-title">Ce Mois</h5>
                    <ul class="list-unstyled">
                        <li>Ventes : {{$nombreVenteMois}}</li>
                        <li>Montant total : {{$montant_mois}} CDF</li>
                    </ul>
                </div>
            </div>
        </div>
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
</style>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
