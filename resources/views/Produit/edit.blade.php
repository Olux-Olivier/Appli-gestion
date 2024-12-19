
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

            .main {
                display: flex;
                margin-top: 100px;
                align-content: center;
                align-items: center;
                justify-content: center;
            }

            .form {
                width: 350px;
            }
            .animated-form {
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

            .btn-primary {
                transition: background-color 0.3s, transform 0.3s;
            }

            .btn-primary:hover {
                background-color: #0056b3; /* Couleur plus foncée au survol */
                transform: scale(1.05); /* Agrandissement léger au survol */
            }
        </style>
    @endsection

    @section('content')
        <div class="form-container animated-form">
            <h2 class="text-center">Modifier le Produit</h2>
            <div class="main">
                <div class="">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" role="alert"
                             style="width: 350px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('produit.update', $produit->id) }}" class="form">
                        @csrf
                        @method('PUT') <!-- Ajout de la méthode PUT pour la mise à jour -->
                        <input type="hidden" name="id" value="{{ $produit->id }}">

                        <div class="form-group">
                            <label for="productName">Nom du Produit</label>
                            <input type="text" class="form-control" name="nom" id="productName"
                                   placeholder="Entrez le nom du produit" value="{{ $produit->nom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="unitPrice">Prix Unitaire (par kg)</label>
                            <input type="number" name="prix_unitaire" class="form-control" id="unitPrice"
                                   placeholder="Entrez le prix unitaire" value="{{ $produit->prix_unitaire }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier le Produit</button>
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
