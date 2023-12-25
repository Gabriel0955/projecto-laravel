<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principio extends Model
{
    protected $fillable = [
        'portada','novedad1','novedad2','novedad3','portada2'
    ];
    protected $table = 'principio';
    use HasFactory;
    
}
