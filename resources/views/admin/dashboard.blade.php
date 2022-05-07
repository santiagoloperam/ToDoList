@extends('admin.layout')


@section('header')

	<h1>
		El Pais

		<small>To Do List</small>
	</h1>

	

@stop 



@section('content')

<h1>DASHBOARD</h1>

<p> Usuario autenticado: {{ auth()->user()->name }} </p>


@stop