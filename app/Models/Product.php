<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'title', 'quantite', 'price_uni', 'price_total', 'date_de_facture', 'description', 'etat'];

}
