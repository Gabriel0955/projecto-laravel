<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $fillable = [
        'nombre', 'email','telefono', 'direccion'
    ];
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'proveedor_categoria', 'proveedor_id', 'categoria_id');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
