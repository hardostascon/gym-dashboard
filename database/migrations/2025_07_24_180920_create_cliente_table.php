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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_nombre', 20)->nullable(false);
            $table->string('cliente_apellido', 25)->nullable(false);
            $table->string('cliente_cedula', 10)->nullable(false);
            $table->date('cliente_fechanacimiento');
            $table->string('cliente_genero', 1);
            $table->string('cliente_telefono', 20);
            $table->string('cliente_email', 20);
            $table->text('cliente_direccion');
            $table->text('cliente_contactoemer');
            $table->date('cliente_registro');
            $table->string('cliente_estado', 1);
            $table->longText('cliente_foto');
            $table->text('cliente_observacionmedica');
            $table->timestamp('cliente_fecha_creacion', precision: 0);
            $table->timestamp('cliente_fechaactualizacion', precision: 0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
