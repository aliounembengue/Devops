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
   public function up(): void
    {
        Schema::table('habitants', function (Blueprint $table) {
            $table->date('date_naiss')->nullable()->after('telephone');
            $table->string('lieu_naiss')->nullable()->after('date_naiss');
        });
    }

    public function down(): void
    {
        Schema::table('habitants', function (Blueprint $table) {
            $table->dropColumn(['date_naiss', 'lieu_naiss']);
        });
    }
};
