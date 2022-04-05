<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServicioExport;

class ServicioController extends Controller
{
    public function index(Request $request){
        $texto=trim($request->get('texto'));

        $servicios = DB::table('servicios')
            ->select('id','nombre','description','costo')
            ->where('nombre','LIKE','%'.$texto.'%')
            ->orderBy('id','asc')
            ->paginate(3);
        return view('servicios.index', compact('servicios','texto'));
    }

    public function show($id){
        $servicio = Servicio::findOrFail($id);
        return view('servicios.show',compact('servicio'));
    }

    public function create(){
        $servicio = new Servicio;
        return view('servicios.create',compact('servicio'));
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'description' => 'required',
            'costo' => 'required|integer',
        ]);

        $servicio = new Servicio;
        $servicio->fill($request->all());

        if($servicio->save()){
            return redirect()->route('servicios.index')->with('registrado','ok');
        }
    }

    public function edit($id){
        $servicio = Servicio::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre' => 'required',
            'description' => 'required',
            'costo' => 'required',
        ]);
        
        $servicio = Servicio::findOrFail($id);
        $servicio->fill($request->all());

        if($servicio->save()){
            return redirect()->route('servicios.index')->with('editado','ok');
        }
    }

    public function destroy($id){
        Servicio::destroy($id);
        return redirect()->route('servicios.index')->with('eliminado','ok');
    }

    public function pdf(){
        $servicios = Servicio::paginate();
        $totalServicios = Servicio::count();
        $pdf = PDF::loadView('servicios.pdf',['servicios'=>$servicios],['totalServicios'=>$totalServicios]);
        //return $pdf->download('servicios.pdf');
        return $pdf->stream();
    }

    public function excel(){
        return Excel::download(new ServicioExport, 'servicios.xlsx');
    }
}
