@extends('super_admin.layout')


@section('header')

	<h1>
		PANEL DE CONTROL
		<small>Bienvenido a Mercatrack</small>
	</h1>

	

@stop 



@section('content')

<h1>DASHBOARD</h1>

<p> Usuario autenticado: {{ auth()->user()->name }} </p>


@stop