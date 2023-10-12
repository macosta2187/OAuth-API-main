<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';    
    protected $fillable = ['id_empleado','nombre', 'contraseña', 'es_almacen', 'es_chofer']; 
    use SoftDeletes;
}
