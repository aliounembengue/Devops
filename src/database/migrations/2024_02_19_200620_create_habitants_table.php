<?php

// database/migrations/xxxx_xx_xx_create_habitants_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitantsTable extends Migration
{
    public function up()
    {
        Schema::create('habitants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->foreignId('id_maison')->constrained('maisons');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('habitants');
    }
}
