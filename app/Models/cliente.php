<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class cliente extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'cliente_nombre',
        'cliente_apellido',
        'cliente_cedula',
        'cliente_fechanacimiento',
        'cliente_genero',
        'cliente_telefono',
        'cliente_email',
        'cliente_direccion',
        'cliente_contactoemer',
        'cliente_registro',
        'cliente_estado',
        'cliente_foto',
        'cliente_observacionmedica',
        'cliente_fecha_creacion',
        'cliente_fechaactualizacion'

    ];

    protected $table = 'cliente';
    public $timestamps = false;
}
