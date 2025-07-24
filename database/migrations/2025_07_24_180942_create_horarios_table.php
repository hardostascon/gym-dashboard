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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('horarios_nombre', 100)->nullable(false);
            $table->text('horarios_descripcion');
            $table->string('periodo_estado', 1);
            $table->timestamp('horarios_fecha_creacion', precision: 0);
            $table->timestamp('horarios_fechaactualizacion', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
