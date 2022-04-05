<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;//Modelo Curso
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class InscripcionesController extends Controller
{
    public function index(Request $request){
        $texto=trim($request->get('texto'));

        $inscripciones = Inscripcion::join('cursos','inscripciones.curso_id','=','cursos.id')
            ->join('users','inscripciones.usuario_id','=','users.id')
            ->where('users.id','=',Auth()->user()->id)
            ->orderBy('inscripciones.id','asc')
            ->paginate(10);

        return view('pagosInscripcion.index', compact('inscripciones','texto'));
    }

    public function inscPDF($id){
        $inscripcion = DB::table('inscripciones')
            ->join('cursos','inscripciones.curso_id','=','cursos.id')
            ->join('users','inscripciones.usuario_id','=','users.id')
            ->where('users.id','=',Auth()->user()->id)
            ->where('inscripciones.id','=',$id)
            ->get();

        $pdf = PDF::loadView('pagosInscripcion.inscPDF',['inscripcion'=>$inscripcion]);
        return $pdf->download('__inscripciones.pdf');
    }

    public function show(Inscripcion $inscripcion){
        return view('pagos.show',compact('inscripcion'));
    }
}
