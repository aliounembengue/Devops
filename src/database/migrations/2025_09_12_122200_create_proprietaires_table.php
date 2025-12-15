<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proprietaires', function (Blueprint $table) {
            $table->id();
            $table->string('nomPro');
            $table->string('prenomPro');
            $table->string('telephonePro');
            $table->date('dateNaissancePro');
            $table->string('lieuNaissancePro');
            $table->timestamps();
        });

        // Ajouter la relation avec la table maisons
        Schema::table('maisons', function (Blueprint $table) {
            $table->foreignId('proprietaire_id')->nullable()->constrained('proprietaires')->onDelete('set null');
        });
    }

    public function down(): void
    {
      Schema::table('maisons', function (Blueprint $table) {
    if (!Schema::hasColumn('maisons', 'quartier_id')) {
        $table->foreignId('quartier_id')->constrained()->after('rue');
    }
});


        Schema::dropIfExists('proprietaires');
    }
};
