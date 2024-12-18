<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->string('nomclient');
            $table->foreignId('produit_id')->constrained()->cascadeOnDelete();
            $table->string('code_vente');
            $table->float('qte');
            $table->float('prix_unitaire');
            $table->float('prix_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};
