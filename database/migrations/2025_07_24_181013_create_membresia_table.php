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
        Schema::create('membresia', function (Blueprint $table) {
            $table->id();
            $table->string('membresia_nombre', 100)->nullable(false);
            $table->text('membresia_descripcion');
            $table->string('membresia_duracion', 50)->nullable(false);
            $table->decimal('membresia_precio', total: 8, places: 2);
            $table->foreignId('membresia_periodicidad')->constrained(
                table: 'periodos', indexName: 'id'
                );
            $table->unsignedBigInteger('membresia_servicios')->nullable(false);    
            $table->foreign('membresia_servicios', 'fk_membresia_servicios')
                ->references('id')
                ->on('servicios');
            $table->unsignedBigInteger('membresia_horario')->nullable(false); 
            $table->foreign('membresia_horario', 'fk_membresia_horario')
                ->references('id')
                ->on('horarios');   
            $table->string('membresia_estado', 1);       
            $table->timestamp('membresia_fecha_creacion', precision: 0);
            $table->timestamp('membresia_fechaactualizacion', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresia');
    }
};
