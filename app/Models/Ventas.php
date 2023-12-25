<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ventas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [ 'total', 'cliente_id', 'empleado_id', 'metodo_pago_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_venta')->withPivot('cantidad');
    }
    
    
    
    
}
