<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    protected $fillable = [
        'nombre', 'direccion','telefono', 'correo' , 'cedula' , 'imagen'
    ];
    use HasFactory;
    use SoftDeletes;
}
