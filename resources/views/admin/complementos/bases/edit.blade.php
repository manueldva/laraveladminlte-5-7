@extends('adminlte::page')

@section('title', 'Gestión - Bases de Datos')

@section('content_header')

    <h1>
      Gestionar Bases de Datos
      <!--<small>Listado</small>-->
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('bases.index')}}">Bases de Datos</a></li>
      <li class="active">Editar</li>
    </ol>

@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border box-default">
    <strong>Editar Base de Datos</strong>
  </div>
    
  <div class="panel-body">
    <div class="row">

			{!! Form::model($base, ['route' => ['bases.update', $base->id], 'method' => 'PUT']) !!}
                    
        @include('admin.complementos.bases.partials.form')

      {!! Form::close() !!}

		</div>
	</div>
</div>


@endsection