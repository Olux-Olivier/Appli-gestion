<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = ['nomclient','produit_id', 'qte', 'prix_unitaire', 'prix_total'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function Facture()
    {
        return $this->hasOne(Facture::class);
    }
}
