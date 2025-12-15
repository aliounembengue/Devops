<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('habitants', function (Blueprint $table) {
          $table->unsignedBigInteger('id_maison')->nullable()->change();
            $table->foreign('quartier_id')->references('id')->on('quartiers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('habitants', function (Blueprint $table) {
            $table->dropForeign(['quartier_id']); // supprime la contrainte étrangère
            $table->dropColumn('quartier_id');    // supprime la colonne
        });
    }
};
