<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchivoInController extends Controller
{
    public function index(Request $request){
        $texto=trim($request->get('texto'));

        $inscripciones = Inscripcion::join('cursos','inscripciones.curso_id','=','cursos.id')
            ->join('users','inscripciones.usuario_id','=','users.id')
            ->where('nombre','LIKE','%'.$texto.'%')
            ->orderBy('inscripciones.id','asc')
            ->paginate(10);

        return view('inscripciones.index', compact('inscripciones','texto'));
    }

    public function show($id){
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripcion.show',compact('inscripcion'));
    }
}
