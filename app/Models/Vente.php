<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = ['nomclient','produit_id','code_vente', 'qte', 'prix_unitaire', 'prix_total'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function Facture()
    {
        return $this->hasOne(Facture::class);
    }
}
