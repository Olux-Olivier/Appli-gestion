<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ['vente_id', 'date_facture', 'total_facture'];

    public function Vente()
    {
        return $this->belongsTo(Vente::class);
    }
}
