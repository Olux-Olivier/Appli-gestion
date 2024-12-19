<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Ajout de Produit</title>

    @extends('base')
    @section('styles')
        <style>
            body {
                justify-content: center;
                align-items: center;
                background-color: #f8f9fa;
            }
            .ma_row{
                display: flex;
                justify-content: center;
            }
            .form-container {
                margin-top: 50px;
                width: 100%;
            }
            .main{
                display: flex;
                margin-left:10px ;
                width: 100%;
                background: #bec3c7;
                justify-content: center;
            }
            .form{
                width: 350px;
                padding:20px;
                background: #cecece;
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
            <div class="form-container">
                <h2 class="text-center">Enregistrer une vente</h2>

                <div class="row ma_row">
                    <div class="">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center " role="alert" style="width: 350px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('vente.store')}}" class="form" >
                            @csrf
                            <div class="form-group ">
                                <label for="productName">Nom du client</label>
                                <input type="text" class="form-control " name="nom" id="productName"  placeholder="Entrez le nom du client" required>
                            </div>
                            <div class="form-group">
                                <label for="dropdown" class=" ">Choisissez un produit</label>
                                <select class="form-control  shadow-sm" id="dropdown" name="produit_id" required>
                                    <option value="" data disabled selected>Choisissez un produit</option>
                                    @foreach($produits as $produit)
                                        <option value="{{ $produit->id }}" prix-produit="{{$produit->prix_unitaire}}">{{ $produit->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="unitPrice">Prix Unitaire (par kg)</label>
                                <input type="number" name="prix_unitaire" class="form-control" id="associatedField" placeholder="..." readonly>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantité</label>
                                <input type="number" name="qte" class="form-control" id="inputNumber" placeholder="Entrez la quantité" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Prix total</label>
                                <input type="number" name="qte_stock" class="form-control" id="totalField" placeholder="Entrez la quantité" readonly>
                            </div>
                            <button type="button" id="addProduct" class="btn btn-primary">Ajouter le Produit</button>

                        </form>
                    </div>

                <div class="main col-md-6">

                    <!-- Bloc gauche pour afficher les produits ajoutés -->
                    <div class="">
                        <h4 class="text-center">Produits ajoutés</h4>
                        <div class="scrollable-table-container">
                        <table class="table table-bordered " style="width: 100%" id="productList">
                            <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Prix Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Les produits ajoutés seront insérés ici -->
                            </tbody>
                        </table>
                        </div>
                        <form action="{{ route('vente.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="nom_client" value="-------" id="hiddenName">
                            <div id="hiddenFields"></div>
                            TOTAL FACTURE
                            <input type="text" name="totalCommande" id="associatedTotalCommandeField" class="form-control" placeholder="0.0"  readonly>
                            <button type="submit" id="submitOrder" class="btn btn-success btn-block">Valider</button>
                        </form>

                    </div>
                </div>

            </div>
    @endsection

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script >
            document.addEventListener('DOMContentLoaded',()=>{
                const dropdown = document.getElementById('dropdown')
                const associatedField = document.getElementById('associatedField')
                const inputNumber = document.getElementById('inputNumber');
                const totalField = document.getElementById('totalField');
                const addProductButton = document.getElementById('addProduct');
                const submitOrderButton = document.getElementById('submitOrder');
                const productList = document.getElementById('productList').querySelector('tbody')
                const hiddenFields = document.getElementById('hiddenFields');

                const productName = document.getElementById('productName')
                const hiddenName = document.getElementById('hiddenName')
                const associatedTotalCommandeField = document.getElementById('associatedTotalCommandeField')

                productName.addEventListener('input',()=>{
                    hiddenName.value = productName.value
                })

                function formatMontant(montant) {
                    return new Intl.NumberFormat('fr-FR', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }).format(montant);
                }

                let products = [];
                let totalCommande = 0;

                function toggleSubmitButton() {
                    const totalValue = parseFloat(associatedTotalCommandeField.value) || 0;
                    if (totalValue > 0) {
                        submitOrderButton.style.display = 'block';
                    } else {
                        submitOrderButton.style.display = 'none';
                    }
                }

                dropdown.addEventListener('change', (e)=>{
                    const selectedOption = e.target.options[e.target.selectedIndex]

                    const valeurAssociee = selectedOption.getAttribute('prix-produit')

                    associatedField.value = valeurAssociee || ''
                })

                inputNumber.addEventListener('input', () => {
                    const number = parseFloat(inputNumber.value) || 0;

                    // Calculer le total (nombre x 40)
                    const total = number * associatedField.value;

                    // Mettre à jour le champ du total
                    totalField.value = total.toFixed(2); // Affiche avec deux décimales
                });


                addProductButton.addEventListener('click', () => {
                    const productId = dropdown.value;
                    const productName = dropdown.options[dropdown.selectedIndex].text;
                    const unitPrice = parseFloat(associatedField.value);
                    const quantity = parseFloat(inputNumber.value);
                    const totalPrice = parseFloat(totalField.value);

                    if (!productId || !quantity || !unitPrice) {
                        alert('Veuillez remplir tous les champs correctement.');
                        return;
                    }
                    const existingProductIndex = products.findIndex(p => p.productId === productId);

                    if (existingProductIndex !== -1) {
                        // Remplacer le produit existant
                        const oldTotalPrice = products[existingProductIndex].totalPrice;

                        products[existingProductIndex] = { productId, productName, unitPrice, quantity, totalPrice };
                        // Mettre à jour la ligne correspondante dans le tableau
                        const row = productList.children[existingProductIndex];
                        row.innerHTML = `
                            <td>${productName}</td>
                            <td>${unitPrice.toFixed(2)}</td>
                            <td>${quantity}</td>
                            <td>${totalPrice.toFixed(2)}</td>
                        `;

                        const hiddenField = hiddenFields.querySelector(`input[name="products[${productId}][total_price]"]`);
                        if (hiddenField) {
                            hiddenField.value = products[existingProductIndex].totalPrice.toFixed(2);
                        }

                        totalCommande = totalCommande - oldTotalPrice + products[existingProductIndex].totalPrice;
                        associatedTotalCommandeField.value = totalCommande
                    } else {
                        // Ajouter le produit à la liste
                        products.push({ productId, productName, unitPrice, quantity, totalPrice });

                        totalCommande += totalPrice;
                        associatedTotalCommandeField.value = formatMontant( totalCommande)
                        // Mettre à jour l'affichage du tableau
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${productName}</td>
                            <td>${unitPrice.toFixed(2)}</td>
                            <td>${quantity}</td>
                            <td>${totalPrice.toFixed(2)}</td>
                        `;
                        productList.appendChild(row);

                        const fields = `
                            <input type="hidden" name="products[${productId}][name]" value="${productName}">
                            <input type="hidden" name="products[${productId}][unit_price]" value="${unitPrice}">
                            <input type="hidden" name="products[${productId}][quantity]" value="${quantity}">
                            <input type="hidden" name="products[${productId}][total_price]" value="${totalPrice}">
                            <input type="hidden" name="products[${productId}][id]" value="${productId}"/>
                        `;
                        hiddenFields.innerHTML += fields;
                    }

                    associatedTotalCommandeField.value = formatMontant(totalCommande);
                    toggleSubmitButton();
                    // Réinitialiser le formulaire
                    dropdown.value = '';
                    associatedField.value = '';
                    inputNumber.value = '';
                    totalField.value = '';
                });
                toggleSubmitButton();
            })
        </script>
@endsection
