<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reseña extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
