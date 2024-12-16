<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix_unitaire', 'qte_stock'];

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
}
