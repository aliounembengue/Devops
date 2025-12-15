<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('deleguequartiers', function (Blueprint $table) {
            $table->id();
            
            // Lien avec habitant
            $table->foreignId('id_habitant')
                  ->constrained('habitants')
                  ->onDelete('cascade');
            
            // Lien avec quartier
            $table->foreignId('id_quartier')
                  ->constrained('quartiers')
                  ->onDelete('cascade');

            // Infos de connexion pour le délégué
            $table->string('email')->unique();
            $table->string('password');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deleguequartiers');
    }
};
