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
            </tr>
        </thead>
        <tbody>
        @foreach($ventes as $index => $produit)
            <tr class="animated-row">
                <th scope="row">{{$index + 1}}</th>
                <td>{{$produit->nomclient}}</td>
                <td> {{$produit->nom_produit}}</td>
                <td>{{$produit->qte}} Kg</td>
                <td>{{number_format($produit->prix_unitaire, 2,',',' ')}} CDF</td>
                <td>{{number_format($produit->prix_total, 2, ',', ' ')}} CDF</td>

            </tr>
        @endforeach

        </tbody>
    </table>
        </div>
</div>

@endsection

@section('scripts')

@endsection
