<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="{{asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/all.min.css') }}">
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

        .text-center {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<div class="form-container animated-form">
    <h2 class="text-center">Connexion</h2>
    <div class="main">
        <div class="">
            @if($errors->has('not_found'))
                <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert"
                     style="width: 350px;">
                    {{ $errors->first('not_found') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="Entrez votre e-mail" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password"
                           placeholder="Entrez votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</div>
</body>

</html>
