<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('produit',\App\Http\Controllers\ProduitController::class);
Route::get('/produit-destroy/{produit}',[\App\Http\Controllers\ProduitController::class,'destroy']);

