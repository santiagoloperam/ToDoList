@extends('admin.layout')

@section('content')
	<h1>CATEGORIA</h1>

	<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Nueva categoria</button>

	 <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de categorias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

				
              <table id="categorias-table" class="table table-bordered table-striped">


                <thead> 
                	               	
	                <tr>
	                  <th>ID</th>
	                  <th>NOMBRE DE CATEGORIA</th>
	                  <th>ACCIONES</th> 
	                </tr>
                </thead>
                
                <tbody>
                	@foreach($categorias as $categoria)
						<tr>
							<td>{{ $categoria->id }}</td>
							<td>{{ $categoria->nombre }}</td>									
							
							<td>
								&nbsp;&nbsp;&nbsp;
								<a href="{{ route('admin.categorias.edit',$categoria->id) }}"  class="btn btn-xs btn-info" ><i class="fa fa-pencil"></i></a>

								{{--  <a href="{{ route('admin.categorias.delete',$categoria) }}" class="btn btn-xs btn-danger" onclick="return confirm('Está seguro de eliminar el registro?')"><i class="fa fa-times"></i></a> --}}
								<form method="post" action="{{ route('admin.categorias.delete',$categoria->id) }}" class="pull-left">
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
	    $('#categorias-table').DataTable()({
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
	        <h4 class="modal-title" id="myModalLabel">Crear categoria</h4>
	      </div>

	      
	      <div class="modal-body">
	        <div class="row">
				<form method="POST" action="{{route('admin.categorias.store')}}">
					@csrf

					<div class="col-md-8">
						<div class="box box-primary">
							
								<div class="box-body">

									<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
										<label for="nombre" >Nombre de la categoria</label>
										<input name="nombre" placeholder="Ingresa el nombre de la categoria" type="text" class="form-control" value="{{ old('nombre') }}">
										{!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
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

	<!-- MODAL ACTUALIZAR -->
	
	{{-- FIN MODAL ACTUALIZAR--}}
	
@endpush