<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\SolicitudServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertaServiciosController extends Controller
{
    public function index(){
        $servicios = Servicio::all();
        return view('ofertaServicios.index',compact('servicios'));
    }

    public function show($id){
        $servicio = Servicio::findOrFail($id);
        return view('ofertaServicios.show',compact('servicio'));
    }

    public function solicitud(Servicio $servicio){
        $solicitud = new SolicitudServicio;
        return view('ofertaServicios.create',compact('solicitud','servicio'));
    }

    public function store(Request $request){ //Funcion para guardar registro
        $user = $request->usuario_id;
        $servicio = $request->servicio_id;
        $coincidencias = SolicitudServicio::where('usuario_id','=',$user)->where('servicio_id','=',$servicio)->get();
        $count = 0; 

        foreach($coincidencias as $coincidencia){
            $count = 1;
        }

        if ($count == 1) {
            $servicio = Servicio::find($servicio);
            return redirect()->route('Servicio.solicitud',$servicio)->with('error','ok');
        }elseif ($count == 0) {
            $solicitud = new SolicitudServicio;
            $solicitud->fill($request->all());
            if($solicitud->save()){
                $busqueda = SolicitudServicio::all();
                foreach($busqueda as $iterator){
                    if($iterator->servicio_id == $servicio && $iterator->usuario_id == $user){
                        $solicitud = SolicitudServicio::find($iterator->id);
                        $solicitud->folio = $solicitud->id;
                        $solicitud->save();
                    }
                }
                return redirect()->route('ofertaServicios.index')->with('solicitado','ok');
            }else{
                $servicio = Servicio::find($servicio);
                return redirect()->route('Servicio.solicitud');
            }        
        }  
    }
}

