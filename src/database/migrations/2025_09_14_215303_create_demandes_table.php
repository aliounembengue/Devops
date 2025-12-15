<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habitant_id'); // Qui fait la demande
            $table->unsignedBigInteger('delegue_id')->nullable(); // Délégué qui valide
            $table->string('nom_complet');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('nationalite');
            $table->integer('annee_residence');
            $table->string('nom_proprietaire');
            $table->string('numero_maison');
            $table->unsignedBigInteger('quartier_id');
            $table->enum('statut', ['en_attente', 'valide', 'refuse'])->default('en_attente');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('habitant_id')->references('id')->on('habitants')->onDelete('cascade');
            $table->foreign('delegue_id')->references('id')->on('deleguequartiers')->onDelete('set null');
            $table->foreign('quartier_id')->references('id')->on('quartiers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demandes');
    }
};
