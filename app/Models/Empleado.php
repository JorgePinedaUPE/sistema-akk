<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','apellidoPaterno','apellidoMaterno','correo','telefono','numSeguro','puesto','tipoSangre'];

    public function url(){
        return $this->id ? 'empleados.update' : 'empleados.store';
    }

    public function method(){
        return $this->id ? 'PUT' : 'POST';
    }
}
