<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    protected $table='portafolio_multiple';


    public $timestamps=false;

    protected $fillable =[
       'ID_PORTAFOLIO',
       'ID_INSCRIPCION',
       'ID_PRAC_GRUPO',
       'COMENTARIO_AUXILIAR',
       //'RUTA_ARCHIVO',
    ];

    protected $guarded =[

    ];
}
