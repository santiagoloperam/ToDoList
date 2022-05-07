@extends('super_admin.layout')

@section('content')
	<h1>USUARIOS</h1>

	<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Nuevo Usuario</button>

	 <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users-table" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>NOMBRE</th>
	                  <th>EMAIL</th>       
	                  <th>EDITAR</th> 
	                </tr>
                </thead>
                
                <tbody>
                	@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>					
							<td>
								&nbsp;&nbsp;&nbsp;
								<a href="{{ route('super_admin.users.edit',$user) }}"  class="btn btn-xs btn-info" ><i class="fa fa-pencil"></i></a> 

								
									<form method="post" action="{{ route('super_admin.users.delete',$user) }}" class="pull-left">
								    {!! csrf_field() !!} {{ method_field('DELETE') }}
								    <div>
								        <button type="submit" class="btn btn-warning btn btn-xs btn-info" onclick="return confirm('Está seguro de eliminar el registro?')"><i class="fa fa-times"></i></button>
								    </div>                
								</form>	 							
							</td>
						</tr>
                	@endforeach                	
                </tbody>


              </table>
            </div>
            <!-- /.box-body -->
          </div>

@stop

@push('styles')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- MIS ESTILOS -->
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

@endpush
 
@push('scripts')
		<!-- DataTables -->
	<script src="{{ asset('/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
	<script>
	  $(function () {
	    $('#users-table').DataTable()({
	      'paging'      : true,
	      'lengthChange': false,
	      'searching'   : false,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : false
	    })
	  })
	</script>

	

	<!-- Modal CREAR-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Crear Usuario</h4>
	      </div>

	      
	      <div class="modal-body">
	        <div class="row">
				<form method="POST" action="{{route('super_admin.users.store')}}">
					@csrf

					<div class="col-md-8">
						<div class="box box-primary">
							
								<div class="box-body">

									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										<label for="name" >Nombre</label>
										<input name="name" placeholder="Ingresa el nombre del usuario" type="text" class="form-control" value="{{ old('name') }}">
										{!! $errors->first('name','<span class="help-block">:message</span>') !!}
									</div>									

									<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
										<label for="email" >Email</label>
										<input name="email" placeholder="Ingresa el email del usuario" type="email" class="form-control" value="{{ old('email') }}">
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
				
			</div>
	      </div>
	      
	    </div>
	  </div>
		  @if($errors->any())
		    <script>
		        $('#myModal').modal('show');
		    </script>
	    	@endif
	</div>
	{{-- FIN MODAL CREAR --}}

	
@endpush