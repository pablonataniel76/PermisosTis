<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    protected $table='estudiante';

    protected $primaryKey='ID_ESTUDIANTE';

    public $timestamps=false;

    protected $fillable =[
        // 'CONTRASENIA',
        // 'EMAIL',
        // 'NOMBRE_ESTUDIANTE',
        // 'APELLIDO_ESTUDIANTE',
        // 'CODIGO_SIS',
        // 'ESTADO'
    ];

    protected $guarded =[

    ];
}
