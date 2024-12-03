<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    use HasFactory, SoftDeletes;  
    
    protected $table = 'mascotas';  

    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'edad',
        'peso',
        'nombre_dueño',
        'telefono',
        'imagen',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at'; 
}