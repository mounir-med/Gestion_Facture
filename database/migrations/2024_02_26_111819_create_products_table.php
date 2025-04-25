<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->integer('quantite'); // Je suppose que 'quantite' représente la quantité
            $table->decimal('price_uni', 8, 2); // Utilisation de decimal pour les prix avec précision et échelle
            $table->decimal('price_total', 8, 2)->virtualAs('quantite * price_uni'); // Utilisation de decimal pour les prix avec précision et échelle
            $table->date('date_de_facture'); // Champ de type date pour la date de la facture
            $table->text('description')->nullable(); // Champ de type texte, nullable pour une description facultative
            $table->string('etat')->default('Chèque'); // Ajout du champ 'etat' avec une valeur par défaut
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
