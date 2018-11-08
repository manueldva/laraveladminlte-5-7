@extends('adminlte::page')

@section('title', 'Gestión - Tareas')

@section('content_header')

    <h1>
      Gestionar Tareas
      <!--<small>Listado</small>-->
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('tareas.index')}}">Tareas</a></li>
      <li class="active">Editar</li>
    </ol>

@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border box-default">
    <strong>Editar Tarea</strong>
  </div>
    
  <div class="panel-body">
    <div class="row">

			{!! Form::model($tarea, ['route' => ['tareas.update', $tarea->id], 'method' => 'PUT']) !!}
                    
        @include('admin.tareas.partials.form')

      {!! Form::close() !!}

		</div>
	</div>
</div>


@endsection