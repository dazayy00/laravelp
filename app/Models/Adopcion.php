<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adopcion extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'adopciones';

    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'edad',
        'peso',
        'imagen',
        'status',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}