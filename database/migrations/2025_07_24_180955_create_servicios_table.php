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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('servicios_nombre', 100)->nullable(false);
            $table->text('servicios_descripcion');
            $table->string('servicios_estado', 1);
            $table->timestamp('servicios_fecha_creacion', precision: 0);
            $table->timestamp('servicios_fechaactualizacion', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
