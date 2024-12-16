<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajouter-produit', function () {
    return view('Produit.create');
});
