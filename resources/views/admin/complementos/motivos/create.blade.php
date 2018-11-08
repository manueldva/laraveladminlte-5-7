@extends('adminlte::page')

@section('title', 'Gestión - Motivos')

@section('content_header')
    <h1>
      Gestionar Motivos
      <!--<small>Listado</small>-->
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('motivos.index')}}">Motivos</a></li>
      <li class="active">Nuevo</li>
    </ol>

@stop


@section('content')

<div class="box box-primary">
  <div class="box-header with-border box-default">
    <strong>Nuevo Motivo</strong>
  </div>
    
  <div class="panel-body">
    <div class="row">

			{!! Form::open(['route' => 'motivos.store']) !!}

				@include('admin.complementos.motivos.partials.form')

			{!! Form::close() !!}
		</div>
	</div>
</div>


@endsection