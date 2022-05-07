@extends('super_admin.layout')

@section('content')
	<div class="row">
				<form method="POST" action="{{route('super_admin.users.update',$user)}}">
					@csrf
					{{ method_field('PUT') }}

					<div class="col-md-8">
						<div class="box box-primary">
							
								<div class="box-body">

									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										<label for="name" >Nombre</label>
										<input name="name" placeholder="Ingresa el nombre del usuario" type="text" class="form-control" value="{{ old('name', $user->name) }}">
										{!! $errors->first('name','<span class="help-block">:message</span>') !!}
									</div>

									<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
										<label for="email" >Email</label>
										<input name="email" placeholder="Ingresa el email del usuario" type="email" class="form-control" value="{{ old('email', $user->email) }}">
										{!! $errors->first('email','<span class="help-block">:message</span>') !!}
									</div>

									<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} {{ $errors->has('confirm') ? 'has-error' : '' }}">
										<label for="password" >Password</label>
										<input name="password" placeholder="Ingresa un password para el usuario" type="password" class="form-control"><br>
										{!! $errors->first('password','<span class="help-block">:message</span>') !!}
										<input name="confirm" placeholder="confirma el password para el usuario" type="password" class="form-control">
										{!! $errors->first('confirm','<span class="help-block">:message</span>') !!}
									</div>

								</div>
							
						</div>
					</div>

			<div class="modal-footer">
	       		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        		<button type="submit" class="btn btn-primary">Guardar</button>
	      	</div>

	      </form>
				
			
@endsection



@push('scripts')
  
@endpush