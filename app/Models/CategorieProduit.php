<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieProduit extends Model
{
    protected $table = 'categories_produits'; // Specify the table name explicitly

    protected $fillable = ['designation'];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
