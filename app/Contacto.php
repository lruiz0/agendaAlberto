<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

    protected $fillable = [
        'nombre', 'apellido1', 'apellido2', 'email', 'fechaNacimiento', 'sueldoBruto', 'foto', 'tipoImagen', 'telefono', 'user_id'
    ];


}
