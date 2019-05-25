<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model{
    protected $table='portafolio';

    protected $primaryKey='ID_PORTAFOLIO';

    public $timestamps=false;

    protected $fillable =[
        'ID_INSCRIPCION',
        'ID_PRAC_GRUPO',
        'COMENTARIO_AUXILIAR',
    ]; 

    protected $guarded =[

    ];
}
