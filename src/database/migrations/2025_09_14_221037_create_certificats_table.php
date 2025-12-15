<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('certificats', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('habitant_id');
    $table->unsignedBigInteger('delegue_id')->nullable(); // assigné après
    $table->string('nom_complet');
    $table->date('date_naissance');
    $table->string('lieu_naissance');
    $table->string('nationalite');
    $table->integer('annee_residence');
    $table->string('nom_proprietaire');
    $table->string('numero_maison');
    $table->string('quartier');
    $table->enum('status', ['en_attente', 'valide', 'rejete'])->default('en_attente');
    $table->timestamps();

    $table->foreign('habitant_id')->references('id')->on('habitants')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificats');
    }
};
