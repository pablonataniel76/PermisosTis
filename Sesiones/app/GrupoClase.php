<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoClase extends Model
{
    protected $table='grupo_laboratorio';

    protected $primaryKey='ID_GRUPOLAB';

    public $timestamps=false;

    protected $fillable =[
        'ID_DOC_MAT',
        'ID_HORA',
        'ID_AUX',
        'DIA',
        'ESTADO_GC'
    ]; 

    protected $guarded =[

    ];
}
