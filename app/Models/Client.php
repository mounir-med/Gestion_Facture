<?php
// app\Models\Client.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['code_client', 'adresse', 'telephone', 'code_postal', 'ice', 'raison_sociale'];
}

