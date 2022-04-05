<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    use HasFactory;

    protected $table = "solicitud_servicio";

    protected $fillable = ['usuario_id','servicio_id','statusPago'];
}

