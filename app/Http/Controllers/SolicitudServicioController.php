<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SolicitudServicioController extends Controller
{
    public function index(Request $request){
        $texto=trim($request->get('texto'));

        $solicitudes = DB::table('solicitud_servicio')
            ->join('servicios','solicitud_servicio.servicio_id','=','servicios.id')
            ->join('users','solicitud_servicio.usuario_id','=','users.id')
            ->where('users.id','=',Auth()->user()->id)
            ->orderBy('solicitud_servicio.id','asc')
            ->paginate(3);

        return view('pagosServicios.index', compact('solicitudes','texto'));
    }

    public function soliPDF($id){
        $solicitud = DB::table('solicitud_servicio')
            ->join('servicios','solicitud_servicio.servicio_id','=','servicios.id')
            ->join('users','solicitud_servicio.usuario_id','=','users.id')
            ->where('users.id','=',Auth()->user()->id)
            ->where('solicitud_servicio.id','=',$id)
            ->get();

        $pdf = PDF::loadView('pagosServicios.soliPDF',['solicitud'=>$solicitud]);
        return $pdf->download('__solicitud_servicio.pdf');
    }

}
