<?php

// database/migrations/xxxx_xx_xx_create_quartiers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuartiersTable extends Migration
{
    public function up()
    {
        Schema::create('quartiers', function (Blueprint $table) {
            $table->id();
            $table->string('nomQuartier');
           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quartiers');
    }
}
