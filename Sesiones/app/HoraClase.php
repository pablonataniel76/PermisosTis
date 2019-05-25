<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoraClase extends Model
{
    protected $table='hora-clase';

    protected $primaryKey='ID_HORA';

    public $timestamps=false;

    protected $fillable =[
        'HORA_INICIO',
        'HORA_FIN'
    ]; 

    protected $guarded =[

    ];
}
