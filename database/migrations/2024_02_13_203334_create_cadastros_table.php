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
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('codigo')->nullable();
            $table->string('descricao');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('colaborador')->nullable();
            $table->string('valor')->nullable();
            $table->string('estado');
            $table->string('setor');
            $table->string('categoria');
            $table->string('observacoes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastros');
    }
};
