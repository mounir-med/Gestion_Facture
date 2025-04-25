<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['code_produit', 'designation', 'type_quantite', 'prix_vente', 'categorie_id', 'tva'];

    public function categorie()
    {
        return $this->belongsTo(CategorieProduit::class);
    }
    public function ligneVente()
    {
        return $this->hasMany(LigneVente::class);
    }
}
