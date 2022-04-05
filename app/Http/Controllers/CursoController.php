<?php

namespace App\Http\Controllers;

use App\Models\Curso;//Modelo Curso
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CursoExport;

class CursoController extends Controller
{
    /*public function __construct(){ //Funcion de autentificacion de usuarios
        $this->middleware('auth');
    }*/
    
    public function index(Request $request){ //Funcion index
        $texto=trim($request->get('texto'));

        $cursos = DB::table('cursos')
            ->select('id','nombre','description','cupo','modalidad','fechaHora','direccion','costo')
            ->where('nombre','LIKE','%'.$texto.'%')
            ->orderBy('id','asc') //Ordenados por ID en orden ascendente
            ->paginate(3); //Paginacion de 3
        return view('cursos.index', compact('cursos','texto'));
    }

    public function show($id){ //Funcion para mostrar la vista index
        $curso = Curso::findOrFail($id);
        return view('cursos.show',compact('curso'));
    }

    public function create(){ //Funcion para mostrar el formulario de registro
        $curso = new Curso;
        return view('cursos.create',compact('curso'));//Redireccionamiento al formulario
    }

    public function store(Request $request){ //Funcion para guardar registro

        $request->validate([
            'nombre' => 'required|max:40',
            'description' => 'required|max:500',
            'cupo' => 'required|integer',
            'fechaHora' => 'required',
            'direccion' => 'required',
            'costo' => 'required|integer',
            'duracion' => 'required|integer',
        ]);

        $curso = new Curso;
        $curso->fill($request->all());

        if($curso->save()){
            return redirect()->route('cursos.index')->with('registrado','ok');
        }
    }

    public function edit($id){ //Funcion que obtiene y muestra el formulario para editar
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, $id){ //Funcion para actualizar los datos
        
        $request->validate([
            'nombre' => 'required',
            'description' => 'required',
            'cupo' => 'required',
            'fechaHora' => 'required',
            'direccion' => 'required',
            'costo' => 'required',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->fill($request->all());

        if($curso->save()){
            return redirect()->route('cursos.index')->with('editado','ok');;
        }
    }

    public function destroy($id){//Funcion para eliminar un resgitro
        Curso::destroy($id);
        return redirect()->route('cursos.index')->with('eliminado','ok');
    }

    public function pdf(){
        $cursos = Curso::paginate();
        $totalCursos = Curso::count();
        $virtuales = Curso::where('modalidad','=','VIRTUAL')->count();
        $presenciales = Curso::where('modalidad','=','PRESENCIAL')->count();
        $pdf = PDF::loadView('cursos.pdf',['cursos'=>$cursos],['totalCursos'=>$totalCursos,'virtuales'=>$virtuales,'presenciales'=>$presenciales]);
        //return $pdf->download('cursos.pdf');
        return $pdf->stream();
    }

    public function excel(){
        return Excel::download(new CursoExport, 'cursos.xlsx');
    }
}
