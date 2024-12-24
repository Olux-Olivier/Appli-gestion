<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/vente/statistiques', function () {
    return view('vente.statistiques');
})->middleware('auth');

Route::get('/produit/statistiques', [\App\Http\Controllers\ProduitController::class, 'statistiques'])->name('produit.statistiques')->middleware('auth');


Route::resource('produit',\App\Http\Controllers\ProduitController::class)->middleware('auth');
Route::get('/produit-destroy/{produit}',[\App\Http\Controllers\ProduitController::class,'destroy'])->middleware('auth');

Route::resource('vente',\App\Http\Controllers\VenteController::class)->middleware('auth');
Route::post('/vente-store',[\App\Http\Controllers\VenteController::class,'store'])->name('vente.store')->middleware('auth');
Route::get('/vente/statistiques',[\App\Http\Controllers\VenteController::class,'statistiques'])->name('vente.statistiques')->middleware('auth');

Route::get('/login',[AuthController::class, 'index'])->name('index');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/create-user',function(){
    \App\Models\User::create([
        'name' => 'utilisateur',
        'email' => 'boucherie3R@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('3r2025r3'),
    ]);
});
