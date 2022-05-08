<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Actividade;
use App\Categoria;

//use DB;

class ActividadesController extends Controller
{
     public function index()
    {
        $actividades = Actividade::where('user_id','=', Auth()->user()->id)->get();
        $categorias = Categoria::where('user_id','=', Auth()->user()->id)->get();
        //$usuario_actual = Auth::user();
        //dd($pdvs);
        return view('admin.actividades.index', compact('actividades','categorias'));
    }


    public function store(Request $request)
    {
        //VALIDACIÓN
        $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required|min:3|max:300'
        ]);
       
        $actividad = new Actividade;
        $actividad->nombre = $request->get('nombre');
        $actividad->descripcion = $request->get('descripcion');
        $actividad->estado = 1;
        $actividad->categoria_id = $request->get('categoria_id');
        $actividad->user_id = auth()->user()->id;
        $actividad->save();

        return back()->with('flash','tu actividad ha sido creada!');

    }

    public function edit(Actividade $actividad)
    {   
        $categorias = Categoria::where('user_id','=', Auth()->user()->id)->get();             
        return view('admin.actividades.edit', compact('actividad','categorias'));
    }

    public function update(Actividade $actividad,  Request $request)
    {
        //VALIDACIÓN
        $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required|min:3|max:300'      
        ]);

        $actividad->nombre = $request->get('nombre');
        $actividad->descripcion = $request->get('descripcion');
        $actividad->categoria_id = $request->get('categoria_id');
        $actividad->estado = $request->get('estado');
        $actividad->save();

        return redirect()->route('admin.actividades.index')->with('flash','tu actividad ha sido actualizada!');

    }

    public function destroy(Actividade $actividad)
    {    
        $actividad->delete(); 
        return redirect()->route('admin.actividades.index');
    }
}
