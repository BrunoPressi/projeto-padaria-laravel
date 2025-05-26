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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->Double('preco');
            $table->Double('peso');
            $table->Date('data_vencimento');
            $table->Date('data_fabricacao');
            $table->unsignedBigInteger('fk_estoque_id');
            $table->timestamps();

            $table->foreign('fk_estoque_id')->references('id')->on('estoques')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
