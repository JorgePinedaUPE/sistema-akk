<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmpleadoExport;

class EmpleadoController extends Controller
{
    public function index(Request $request){
        $texto=trim($request->get('texto'));

        $empleados = DB::table('empleados')
            ->select('id','nombre','apellidoPaterno','apellidoMaterno','numSeguro','puesto')
            ->where('nombre','LIKE','%'.$texto.'%')
            ->orWhere('apellidoPaterno','LIKE','%'.$texto.'%')
            ->orderBy('id','asc')
            ->paginate(3);
        return view('empleados.index', compact('empleados','texto'));
    }

    public function show($id){
        $empleado = Empleado::findOrFail($id);
        return view('empleados.show',compact('empleado'));
    }

    public function create(){
        $empleado = new Empleado;
        return view('empleados.create',compact('empleado'));
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|max:30',
            'apellidoPaterno' => 'required|max:30',
            'apellidoMaterno' => 'required|max:30',
            'correo' => 'required|unique:empleados',
            'telefono' => 'required|min:10|max:10|unique:empleados|integer',
            'numSeguro' => 'required|unique:empleados|integer',
            'puesto' => 'required',
            'tipoSangre' => 'required',
        ]);

        $empleado = new Empleado;
        $empleado->fill($request->all());

        if($empleado->save()){
            return redirect()->route('empleados.index')->with('registrado','ok');
        }
    }

    public function edit($id){
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre' => 'required|max:30',
            'apellidoPaterno' => 'required|max:30',
            'apellidoMaterno' => 'required|max:30',
            'correo' => 'required|unique:empleados',
            'telefono' => 'required|min:10|max:10|unique:empleados|integer',
            'numSeguro' => 'required|unique:empleados|integer',
            'puesto' => 'required',
            'tipoSangre' => 'required',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->fill($request->all());

        if($empleado->save()){
            return redirect()->route('empleados.index')->with('editado','ok');
        }
    }

    public function destroy($id){
        Empleado::destroy($id);
        return redirect()->route('empleados.index')->with('eliminado','ok');
    }

    public function pdf(){
        $empleados = Empleado::paginate();
        $totalEmpleados = Empleado::count();
        $sinSeguro = Empleado::where('numSeguro','=',NULL)->count();
        $pdf = PDF::loadView('empleados.pdf',['empleados'=>$empleados],['totalEmpleados'=>$totalEmpleados,'sinSeguro'=>$sinSeguro]);
        //return $pdf->download('__empleados.pdf');
        return $pdf->stream();
    }

    public function excel(){
        return Excel::download(new EmpleadoExport, 'empleados.xlsx');
    }
}
