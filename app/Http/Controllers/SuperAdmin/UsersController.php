<?php

namespace App\Http\Controllers\SuperAdmin;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	//$usuario_actual = Auth::user();
    	//dd($usuario_actual);
    	return view('super_admin.users.index', compact('users'));
    }

    public function create()
    {
    	return view('super_admin.users.create');
    }

    public function store(Request $request)
    {
		//VALIDACIÓN
		$this->validate($request,[
			'name' => 'required',
			'email' => 'required',
			'password' => 'min:6',
    		'confirm' => 'required_with:password|same:password|min:6'
		]);

		$user = new User;
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->password = bcrypt($request->get('password'));
		$user->save();

		return back()->with('flash','tu usuario ha sido creado!');

    }

    public function edit(User $user)
    {    
    	return view('super_admin.users.edit', compact('user'));
    }

    public function update(User $user,  Request $request)
    {
		//VALIDACIÓN
		$this->validate($request,[
			'name' => 'required',
			'email' => 'required',
			'password' => 'min:6',
    		'confirm' => 'required_with:password|same:password|min:6'
		]);

		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->password = bcrypt($request->get('password'));
		$user->save();

		return redirect()->route('super_admin.users.index')->with('flash','tu usuario ha sido actualizado!');

    }

    public function destroy(User $user)
    {    
    	$user->delete(); 
    	return redirect()->route('super_admin.users.index')->with('flash','tu usuario ha sido eliminado!');
    }
}
