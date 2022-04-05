<?php

namespace App\Http\Controllers;

use App\Models\Efemeride;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class EfemerideController extends Controller
{
    public function index(Request $request){
        $texto=trim($request->get('texto'));

        $efemerides = DB::table('efemerides')
            ->select('id','titulo','image')
            ->where('titulo','LIKE','%'.$texto.'%')
            ->orderBy('id','asc')
            ->paginate(3);
        return view('efemerides.index', compact('efemerides','texto'));
    }

    public function show($id){
        $efemeride = Efemeride::findOrFail($id);
        return view('efemerides.show',compact('efemeride'));
    }

    public function create(){
        $efemeride = new Efemeride;
        return view('efemerides.create',compact('efemeride'));
    }

    public function store(Request $request){

        $request->validate([
            'titulo' => 'required',
            'image' => 'required',
        ]);

        $efemeride = new Efemeride;

        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $img = $request->file('image')->store('efemerides','public');

        $efemeride->titulo = $request->titulo;
        $efemeride->image = $img;
        $efemeride->save();

        if($efemeride->save()){
            return redirect()->route('efemerides.index')->with('registrado','ok');
        }
    }

    public function edit($id){
        $efemeride = Efemeride::findOrFail($id);
        return view('efemerides.edit', compact('efemeride'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'titulo' => 'required',
            'image' => 'required',
        ]);

        $efemeride = Efemeride::findOrFail($id);
        Storage::delete('public/'.$efemeride->image);
        $efemeride->image = $request->file('image')->store('efemerides','public');
        $efemeride->titulo = $request->titulo;
        $efemeride->save();
        if($efemeride->save()){
            return redirect()->route('efemerides.index')->with('editado','ok');
        }
    }

    public function destroy($id){
        $efemeride = Efemeride::findOrFail($id);
        Storage::delete('public/'.$efemeride->image);
        Efemeride::destroy($id);
        return redirect()->route('efemerides.index')->with('eliminado','ok');
    }
}
