@extends('admin.layout')

@section('content')
	<div class="row">
				<form method="POST" action="{{route('admin.actividades.update',$actividad->id)}}">
					@csrf
					{{ method_field('PUT') }}

					<div class="col-md-8">
						<div class="box box-primary">
							
								<div class="box-body">

									<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
										<label for="nombre" >Nombre de la Actividad</label>
										<input name="nombre" placeholder="Ingresa el nombre del Item" type="text" class="form-control" value="{{ old('nombre', $actividad->nombre) }}">
										{!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
									</div>

				              		<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
										<label for="descripcion" >Descripción</label>
										<input name="descripcion" placeholder="Ingresa la Descripción de la Actividad" type="text" class="form-control" value="{{ old('descripcion', $actividad->descripcion) }}">
										{!! $errors->first('descripcion','<span class="help-block">:message</span>') !!}
									</div>

									<div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
						              	<label>Categoria</label>
						              	<select name="categoria_id" id="categoria_id" class="form-control">
						              		<option value="">Seleccione la categoria a la que pertenece</option> 
						              		@foreach($categorias as $categoria)
															<option value="{{ $categoria->id }}" {{ old('categoria_id',$actividad->categoria_id) == $categoria->id ? 'selected' : '' }}>
																{{ $categoria->nombre }} 
															</option>
						              		@endforeach  		
						              	</select>
						              	{!! $errors->first('categoria_id','<span class="help-block">:message</span>') !!}
						              </div>

									<div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
						              	<label>Estado de la Actividad</label>
						              	<select name="estado" id="estado" class="form-control">
						              		<option value="">Seleccione el estado de la Actividad</option> 		              		
															<option value=1 {{ old('estado') == 1 ? 'selected' : '' }}>PENDIENTE</option>
															<option value=2 {{ old('estado') == 2 ? 'selected' : '' }}>FINALIZADA</option>											 		
						              	</select>
						              	{!! $errors->first('estado','<span class="help-block">:message</span>') !!}
		              				</div>

							</div>
						</div>
					<div class="modal-footer">
			       		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        		<button type="submit" class="btn btn-primary">Guardar</button>
			      	</div>

			      </div>

		      </form>

		  </div>
				
			
@stop

@push('scripts')
	
@endpush

