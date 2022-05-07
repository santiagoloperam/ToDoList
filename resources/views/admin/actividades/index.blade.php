@extends('admin.layout')

@section('content')
	<h1>ACTIVIDADES</h1>

	<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Nueva Actividad</button>

	 <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Actividades</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

				
              <table id="actividades-table" class="table table-bordered table-striped">


                <thead> 
                	              	
	                <tr>
	                  <th>ID</th>
	                  <th>ACTIVIDAD</th>
	                  <th>CATEGORIA</th>
	                  <th>DESCRIPCIÓN</th> 
	                  <th>ESTADO</th> 
	                  <th>ACCIONES</th> 
	                </tr>
                </thead>
                
                <tbody id="tableitems">
                	@foreach($actividades as $actividad)
						<tr>
							<td>{{ $actividad->id }}</td>
							<td>{{ $actividad->nombre }}</td>							
							<td>{{ $actividad->categoria->nombre }}</td>							
							<td>{{ $actividad->descripcion }}</td>
							<td>{{ $actividad->estado == 1 ? 'PENDIENTE' : 'FINALIZADA'}}</td>
													
							
							<td>
								&nbsp;&nbsp;&nbsp;
								<a href="{{ route('admin.actividades.edit',$actividad->id) }}"  class="btn btn-xs btn-info" ><i class="fa fa-pencil"></i></a>

								{{--  <a href="{{ route('admin.actividades.delete',$empresa) }}" class="btn btn-xs btn-danger" onclick="return confirm('Está seguro de eliminar el registro?')"><i class="fa fa-times"></i></a>--}}	
								<form method="post" action="{{ route('admin.actividades.delete',$actividad->id) }}" class="pull-left">
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
	    $('#actividades-table').DataTable()({
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
	        <h4 class="modal-title" id="myModalLabel">Crear Actividad</h4>
	      </div>

	      
	      <div class="modal-body">
	        <div class="row">
				<form method="POST" action="{{route('admin.actividades.store')}}"> 
					@csrf

					<div class="col-md-8">
						<div class="box box-primary">
							
								<div class="box-body">

									<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
										<label for="nombre" >Nombre del actividad</label>
										<input name="nombre" placeholder="Ingresa el nombre del actividad" type="text" class="form-control" value="{{ old('nombre') }}">
										{!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
									</div>
					              
								
									<div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
		              	<label>Categoria</label>
		              	<select name="categoria_id" id="categoria_id" class="form-control">
		              		<option value="">Seleccione la categoria a la que pertenece</option> 
		              		@foreach($categorias as $categoria)
											<option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
												{{ $categoria->nombre }} 
											</option>
		              		@endforeach  		
		              	</select>
		              	{!! $errors->first('categoria_id','<span class="help-block">:message</span>') !!}
		              </div>

		              <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
										<label for="descripcion" >Descripción</label>
										<input name="descripcion" placeholder="Ingresa una descripción de la Actividad" type="text" class="form-control" value="{{ old('descripcion') }}">
										{!! $errors->first('descripcion','<span class="help-block">:message</span>') !!}
									</div>

									<!-- <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
		              	<label>Categoria</label>
		              	<select name="estado" id="estado" class="form-control">
		              		<option value="">Seleccione el estado de la tarea</option> 		              		
											<option value=1>PENDIENTE</option>
											<option value=2>FINALIZADA</option>											 		
		              	</select>
		              	{!! $errors->first('estado','<span class="help-block">:message</span>') !!}
		              </div> -->

					              
					             

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