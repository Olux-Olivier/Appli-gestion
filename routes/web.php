<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vente/statistiques', function () {
    return view('vente.statistiques');
});


Route::resource('produit',\App\Http\Controllers\ProduitController::class);
Route::get('/produit-destroy/{produit}',[\App\Http\Controllers\ProduitController::class,'destroy']);

Route::resource('vente',\App\Http\Controllers\VenteController::class);
Route::post('/vente-store',[\App\Http\Controllers\VenteController::class,'store'])->name('vente.store')
    ->middleware('cors');
Route::get('/vente/statistiques',[\App\Http\Controllers\VenteController::class,'statistiques'])->name('vente.statistiques');

