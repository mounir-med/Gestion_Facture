<?php

// app\Models\Vente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $fillable = ['numero_vente', 'date_vente', 'numero_commande', 'mode_paiement'];
    public function ligneVente()
    {
        return $this->hasMany(LigneVente::class);
    }
}

