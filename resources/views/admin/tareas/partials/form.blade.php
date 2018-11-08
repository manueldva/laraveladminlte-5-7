<div class="col-md-12">
	<div class="row col-md-12">
		<div class="form-group pull-right">
		      <button type="submit" class="btn btn btn-primary">
		      	<span class="glyphicon glyphicon-floppy-disk">
		      	</span>
		      		Guardar
		      </button>

		      <a href="{{ route('tareas.index') }}" type="button" class="btn btn btn-default">
		      	<span class="fa fa-list">
		      	</span>
		      		Listado
		      </a>

		</div>
	</div>
</div>

<div class="col-md-6">

	<div class="form-group">
		{{ form::label('titulotarea', 'Titulo Tarea *') }}
		{{ form::text('titulotarea', null, ['class' => 'form-control', 'id' => 'titulotarea']) }}
	</div>

	<div class="form-group">
		{{ form::label('fecha', 'Fecha *') }}
		{{ form::date('fecha', isset($tarea) ? $tarea->fecha : \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'fecha']) }}
	</div>

	<div class="form-group">
		{{ form::label('user_id', 'Asignado *') }}
		{{ form::select('user_id', $users,  null, ['class' => 'form-control'] ) }}
	</div>

	<div class="form-group">
		{{ form::label('motivo_id', 'Motivo *') }}
		{{ form::select('motivo_id', $motivos,  null, ['class' => 'form-control','placeholder' => 'Seleccionar...'] ) }}
	</div>


	<div class="form-group">
		{{ form::label('servidor_id', 'Servidor *') }}
		{{ form::select('servidor_id', $servidores,  null, ['class' => 'form-control','placeholder' => 'Seleccionar...'] ) }}
	</div>

	<div class="form-group">
		{{ form::label('base_id', 'Base de Datos ') }}
		{{ form::select('base_id', [],  null, ['class' => 'form-control','placeholder' => 'Seleccionar...'] ) }}
	</div>

	<div class="form-group">
		{{ form::label('nombrearchivo', 'Nombre Archivo Nuevo/Modificado') }}
		{{ form::text('nombrearchivo', null , ['class' => 'form-control', 'id' => 'nombrearchivo']) }}
	</div>


	<div class="form-group">
		{{ form::label('rutaarchivo', 'Ruta del Archivo') }}
		{{ form::text('rutaarchivo', null, ['class' => 'form-control', 'id' => 'rutaarchivo']) }}
	</div>

	<div class="form-group">
		{{ form::label('codigoactual', 'Fragmento de Codigo a modificar') }}
		{{ form::textarea('codigoactual', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ form::label('codigomodificado', 'Modificación') }}
		{{ form::textarea('codigomodificado', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ form::label('observaciones', 'Observaciones') }}
		{{ form::textarea('observaciones', null, ['class' => 'form-control']) }}
	</div>
	
	<br>

	<div class="form-group">
		{{ form::label('estado', 'Estado:') }}
		<label>
			{{ Form::radio('estado','Abierta')}} Abierta
		</label>
		<label>
			{{ Form::radio('estado','Cerrada')}} Cerrada
		</label>
	</div>


</div>




@push('js')		

	<script type="text/javascript">

	
		$("#servidor_id").select2();
		$("#motivo_id").select2();
		$("#base_id").select2();
		$("#user_id").select2();

		function cargarBases(){ 
			
			var id = $('#servidor_id').val();
		    var APP_URL = "{{ url('/') }}";

			$.ajax({
			url: APP_URL + '/TA_obtenerbases/' + id,
			
			//url: "/habilitarmodulos/" + user
			}).done(function(resultado) {
				console.log(resultado);
				//alert(resultado);
				$('option', '#base_id').remove();
				$("#base_id").append('<option value="" disabled selected>Seleccionar...</option>');
						
				$.each(resultado, function(key, value){
					//$("#rubro_caja").append('<option value="'+value.id+'">'+value.numero+' '+value.letra+'</option>');
					
					var base_id = {!! json_encode((array)$base_id) !!};
					
					if(base_id == value.id )
					{
						$("#base_id").append('<option value="'+value.id+'" selected>'+value.descripcion+'</option>');
					} else
					{
						$("#base_id").append('<option value="'+value.id+'">'+value.descripcion+'</option>');
					}
					
				})
				//alert(resultado);

			
			});
		}
		
		var servidor = $('#servidor_id').val();
		
		if(servidor !== "")
		{
			cargarBases();

		
		}
		


		$('#servidor_id').change(function() {
			cargarBases(); 
		});


	</script>

@endpush

