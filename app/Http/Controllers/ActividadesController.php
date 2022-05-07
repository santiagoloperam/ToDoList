<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

use App\Categoria;
use App\Actividade;
use App\User;

//use DB; 

class ActividadesController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api',['except'=>['unauthorized', 'login']]);
        $this->guard = "api";
    }

    public function index()
    {
        $actividades = Actividade::where('user_id','=', Auth()->user()->id)
                        //->where('estado','=', 1)
                        ->get();
        $categorias = Categoria::where('user_id','=', Auth()->user()->id)
                        ->get();
        return response()->json(['actividades' => $actividades, 'categorias' => $categorias],200);
    }

    public function update($id)
    {       
        $actividad = actividad::where('id','=',$id)->first();
        $actividad->estado = 2;
        $actividad->save();

        return response()->json(['success' => true, 'actividad' => $actividad],200);

    }


}
