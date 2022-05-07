<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Categoria;
//use DB; 

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::where('user_id','=', Auth()->user()->id)->get();

    	//$usuario_actual = Auth::user();
    	//dd($categorias);
    	return view('admin.categorias.index', compact('categorias'));
    }


    public function store(Request $request)
    {
		//VALIDACIÓN
		$this->validate($request,[
			'nombre' => 'required|min:3|max:30'
		]);
        //$empresa = Empresa::where('id_admin','=', Auth()->user()->id)->first();

		$categoria = new Categoria;
		$categoria->nombre = $request->get('nombre');
		$categoria->user_id = auth()->user()->id;
		$categoria->save();

		return back()->with('flash','Categoría creada!');

    }

    public function edit(Categoria $categoria)
    {    
    	return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Categoria $categoria,  Request $request)
    {
		//VALIDACIÓN
		$this->validate($request,[
			'nombre' => 'required|min:3|max:30'            
		]);

		$categoria->nombre = $request->get('nombre');
		$categoria->save();

		return redirect()->route('admin.categorias.index')->with('flash','Categoría actualizada!');

    }

    public function destroy(Categoria $categoria)
    {    
    	$categoria->delete(); 
    	return redirect()->route('admin.categorias.index')->with('flash','La Categoría ha sido Eliminada!');
    }
}
