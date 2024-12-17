<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Ajout de Produit</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    @extends('base')
    @section('styles')
        <style>
            body {
                justify-content: center;
                align-items: center;
                background-color: #f8f9fa;
            }

            .form-container {
                margin-top: 50px;
                width: 100%;
            }
            .main{
                display: flex;
                margin-top: 100px;
                align-content: center;
                align-items: center;
                justify-content: center;
            }
            .form{
                width: 350px;
            }
        </style>
    @endsection

    @section('content')
        <div class="form-container">
            <h2 class="text-center">Enregistrer une vente</h2>
            <div class="main">
                <div class="">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center " role="alert" style="width: 350px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('produit.store')}}" class="form" >
                        @csrf
                        <div class="form-group ">
                            <label for="productName">Nom du client</label>
                            <input type="text" class="form-control " name="nom" id="productName" placeholder="Entrez le nom du client" required>
                        </div>
                        <div class="form-group">
                            <label for="dropdown" class=" ">Choisissez un produit</label>
                            <select class="form-control  shadow-sm" id="dropdown" name="element_id" required>
                                <option value="" disabled selected>Choisissez un élément</option>
                                @foreach($produits as $produit)
                                    <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unitPrice">Prix Unitaire (par kg)</label>
                            <input type="number" name="prix_unitaire" class="form-control" id="unitPrice" placeholder="Entrez le prix unitaire" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantité à Mettre en Stock</label>
                            <input type="number" name="qte_stock" class="form-control" id="quantity" placeholder="Entrez la quantité" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter le Produit</button>
                    </form>
                </div>
            </div>

        </div>
    @endsection

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
