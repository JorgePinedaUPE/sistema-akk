<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertaCursosController extends Controller
{
    public function index(){
        $cursos = Curso::all();
        return view('ofertaCursos.index',compact('cursos'));
    }

    public function show($id){
        $curso = Curso::findOrFail($id);
        return view('ofertaCursos.show',compact('curso'));
    }

    public function inscripcion(Curso $curso){
        $inscripcion = new Inscripcion;
        return view('ofertaCursos.create',compact('inscripcion','curso'));
    }

    public function store(Request $request){ //Funcion para guardar registro
        $user = $request->usuario_id;
        $id = $request->curso_id;
        $curso = Curso::find($id);
        $coincidencias = Inscripcion::where('usuario_id','=',$user)->where('curso_id','=',$curso->id)->get();
        $count = 0; 

        foreach($coincidencias as $coincidencia){
            $count = 1;
        }

        if ($count == 1) {
            return redirect()->route('Curso.inscripcion',$curso)->with('error','ok');
        }elseif($curso->cupo == 0){
            return redirect()->route('Curso.inscripcion',$curso)->with('cupo','ok');
        }elseif ($count == 0 && $curso->cupo > 0) {
            $registro = new Inscripcion;
            $registro->fill($request->all());

            if($registro->save()){ 
                $cupo = $curso->cupo - 1;
                $curso->cupo = $cupo;
                $curso->save();
                $busqueda = Inscripcion::all();
                foreach($busqueda as $iterator){
                    if($iterator->curso_id == $curso->id && $iterator->usuario_id == $user){
                        $inscripcion = Inscripcion::find($iterator->id);
                        $inscripcion->folio = $inscripcion->id;
                        $inscripcion->save();
                    }
                }
                
                return redirect()->route('ofertaCursos.index')->with('inscrito','ok');
            }
        }  
    }
}