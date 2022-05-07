@extends('admin.layout')

@section('content')
	<div class="row">
				<form method="POST" action="{{route('admin.categorias.update',$categoria->id)}}">
					@csrf
					{{ method_field('PUT') }}

					<div class="col-md-8">
						<div class="box box-primary">
							
								<div class="box-body">

									<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
										<label for="nombre" >Nombre de la Categoria</label>
										<input name="nombre" placeholder="Ingresa el nombre de la Categoria" type="text" class="form-control" value="{{ old('nombre', $categoria->nombre) }}">
										{!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
									</div>

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
				
			
@endsection

@push('scripts')

  

@endpush	