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
        Schema::create('itens_vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_produto_id');
            $table->unsignedBigInteger('fk_vendas_id');
            $table->Integer('quantidade');
            $table->Integer('preco_unitario');
            $table->timestamps();

            $table->foreign('fk_vendas_id')->references('id')->on('vendas')->onDelete('cascade');
            $table->foreign('fk_produto_id')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_vendas');
    }
};
