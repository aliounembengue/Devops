<?php

// database/migrations/create_maisons_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonsTable extends Migration
{
    public function up()
    {
        Schema::create('maisons', function (Blueprint $table) {
            $table->id();
            $table->string('surface');
            $table->string('rue');

           $table->unsignedBigInteger('quartier_id');
$table->foreign('quartier_id')->references('id')->on('quartiers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maisons');
    }
}
