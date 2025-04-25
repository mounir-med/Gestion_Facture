<?php
// app\Models\LigneVente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneVente extends Model
{
    protected $fillable = ['vente_id', 'produit_id', 'quantite', 'prix'];

    public function vente()
{
    return $this->belongsTo(Vente::class, 'vente_id');
}

public function produit()
{
    return $this->belongsTo(Produit::class, 'produit_id');
}

}

