@extends('adminlte::page')

@section('title', 'Gestión - Tareas')

@section('content_header')
  <h1>
    Gestionar Tareas
    <!--<small>Listado</small>-->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('tareas.index')}}">Tareas</a></li>
    <li class="active">Listado</li>
  </ol>

@stop


@section('include_delete')
	@include('include.modal-delete')
@stop

@section('content')	

<div class="box box-primary">
	<div class="box-header with-border box-default">
	   <strong> Listado Tareas </strong>
	   <form class="navbar-form navbar-right" role="search">
	       {{ Form::model(Request::only('type', 'val', 'servidor_id'), array('route' => 'tareas.index', 'method' => 'GET'), array('role' => 'form', 'class' => 'navbar-form pull-right')) }}
			    <div class="form-group">
			      {{ form::label('buscar', 'Tipo Busqueda:') }}
			      {{ form::select('type', config('options.tareatypes'), null, ['class' => 'form-control', 'id' => 'type'] ) }}
						&nbsp;
			      {{ form::text('val', null, ['class' => 'form-control', 'id' => 'val']) }}
			      &nbsp;
						<span id="servidores2" class="form-group">
						{{ Form::select('servidor_id', $servidores, null, ['class'=>'form-control', 'id' => 'servidor_id','placeholder' => 'Seleccionar...']) }}
						</span>
						
						&nbsp;
			      <button type="submit" class="form-control btn btn-sm btn-success"><span class="glyphicon glyphicon-search"></span> Buscar</button>
						&nbsp;
			      @if(Auth::user()->userType !== 'READONLY')
			      <a href="{{ route('tareas.create')}}" class="form-control btn btn-sm btn-primary">
			        <span class="glyphicon glyphicon-plus"></span> Crear
			      </a>  
			      @endif
			    </div>
		    {{ Form::close() }}
      </form>
	</div>
		
	<div class="panel-body">
	    <div class="panel-body">
	        <div class="row">
	          <div class="table-responsive" >
	            <table class="table table-striped table-hover tablesorter" data-form="Form" id="index">
	              <thead>
	                <tr>
	                  <th width="10px"> Nro Tarea</th>
	                  <th> Fecha</th>
	                  <th> Asignado</th>
										<th> Titulo </th>
	                  <th> Motivo</th>
					  <th> Servidor</th>
					  <th> Estado</th>
	                  <th colspan="3">&nbsp;</th>
	                </tr>
	              </thead>
	              <tbody>
	                @foreach ($tareas as $tarea)
	                  <tr>
	                    <td>{{ $tarea->id }} </td>
	                    <td>{{ $tarea->fecha }}</td>
	                    <td>{{ $tarea->usuario_alta }}</td>
											<td>{{ $tarea->titulotarea }}</td>
											<td>{{ $tarea->motivo->descripcion }}</td>
											<td>{{ $tarea->servidor->descripcion }}</td>
											@if($tarea->estado == 'Abierta')
												<td>
													<img src="{{url('imagedefeult/abierta.ico')}}" class="user-image"  width="30" height="30" alt="User Image" >
												</td>
											@else
												<td>
													<img src="{{url('imagedefeult/cerrada.ico')}}" class="user-image" width="30" height="30" alt="User Image" >
												</td>
											@endif
										
	                    <td width="10px">
	                      <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-sm btn-default">
	                        Ver
	                      </a>
	                    </td>
	                    
	                    <td width="10px">
													@if(Auth::user()->userType !== 'READONLY')
													@if($tarea->usuario_alta == Auth::user()->username)
													@if($tarea->estado == 'Abierta')
														<a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-sm btn-default">
															Editar
														</a>
													@endif
													@endif
													@endif
	                    </td>
	                    <td width="10px">
												@if(Auth::user()->userType !== 'READONLY')
												@if($tarea->usuario_alta == Auth::user()->username)
												@if($tarea->estado == 'Abierta')
													{!! Form::model($tarea, ['method' => 'delete', 'route' => ['tareas.destroy', $tarea->id], 'class' =>'form-inline form-delete']) !!}
													{!! Form::hidden('id', $tarea->id) !!}
													{!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger delete', 'name' => 'delete_modal']) !!}
													{!! Form::close() !!}
												@endif
												@endif
												@endif
	                    </td>
	                  

	                  </tr>
	                @endforeach
	              </tbody>
	            </table>
	          </div>  
						<div> <?php echo  'Mostrando ' . $tareas->firstItem() . ' a ' . $tareas->lastItem() . ' de ' . $tareas->total() . ' registros'; ?>	</div>
	          {{ $tareas->appends(Request::only(['type', 'val', 'servidor_id']))->render() }}
	        </div>
	    </div>
    </div>
</div>


@endsection





@push('js')
	
	<script src="{{ asset('js/resources/confirm-delete-general.js') }}"></script>
	<script src="{{ asset('js/resources/jquery.tablesorter.min.js') }}"></script> 

	<script type="text/javascript">

		
		function searchType(){ 
		   var type = $('#type').val();
			if (type == 'codigo'){
				$('#val').show();
				$('#servidores2').hide();
				$('#val').attr('type','number');
			} else if (type == 'usuario')
			{
				$('#val').show();
				$('#servidores2').hide();
				$('#val').attr('type','text');
			} else if (type == 'servidor')
			{
				$('#val').hide();
				$('#servidores2').show();
				//$('#val').attr('type','text');
			} else
			{
				$('#val').show();
				$('#servidores2').hide();
				$('#val').attr('type','text');
			}
		}

		searchType(); 
		

		$('#type').change(function(e) {
			searchType(); 
			$('#val').val('');
			$('#val').focus();
			$('#servidor_id').val('').select2();
		});



		/*$(document).ready(function() 
		{ 
			$("#index").tablesorter( {sortList: [[0,0]]} ); 
		} 
		); */
		
	</script>
@endpush