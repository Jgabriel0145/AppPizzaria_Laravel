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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->double('valor_total_venda');
            $table->foreignId('clientes_id')->constrained()->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreignId('funcionarios_id')->constrained()->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->timestamps();
        });

        Schema::create('venda_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendas_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('produtos_id')->constrained()->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venda_produto');
        Schema::dropIfExists('vendas');
    }
};
