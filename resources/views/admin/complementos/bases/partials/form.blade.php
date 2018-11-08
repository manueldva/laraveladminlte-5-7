<div class="col-md-12">
	<div class="row col-md-12">
		<div class="form-group pull-right">
		      <button type="submit" class="btn btn btn-primary">
		      	<span class="glyphicon glyphicon-floppy-disk">
		      	</span>
		      		Guardar
		      </button>

		      <a href="{{ route('bases.index') }}" type="button" class="btn btn btn-default">
		      	<span class="fa fa-list">
		      	</span>
		      		Listado
		      </a>

		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		{{ form::label('servidor_id', 'Servidor *') }}
		{{ form::select('servidor_id', $servidores, null, ['class' => 'form-control','placeholder' => 'Seleccionar...'] ) }}
	</div>

	<div class="form-group">
		{{ form::label('descripcion', 'Descripción *') }}
		{{ form::text('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion']) }}
	</div>

</div>


