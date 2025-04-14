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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->Enum('metodo', ['cartão','pix','dinheiro']);
            $table->Double('total');
            $table->unsignedBigInteger('fk_vendas_id');
            $table->timestamps();

            $table->foreign('fk_vendas_id')->references('id')->on('vendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
