<?php

namespace App\Http\Controllers;

use App\Models\SolicitudServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchivoServController extends Controller
{
    public function index(Request $request){
        $texto=trim($request->get('texto'));

        $solicitudes = DB::table('solicitud_servicio')
            ->join('servicios','solicitud_servicio.servicio_id','=','servicios.id')
            ->join('users','solicitud_servicio.usuario_id','=','users.id')
            ->where('nombre','LIKE','%'.$texto.'%')
            ->orderBy('solicitud_servicio.id','asc')
            ->paginate(3);

        return view('solicitudes.index', compact('solicitudes','texto'));
    }

    public function show($id){
        $solicitud = SolicitudServicio::findOrFail($id);
        return view('solicitud.show',compact('solicitud'));
    }
}
