@extends('adminlte::page')

@section('title', 'Gestión - Servidores')

@section('content_header')
    <h1>
      Gestionar Servidores
      <!--<small>Listado</small>-->
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('motivos.index')}}">Servidores</a></li>
      <li class="active">Nuevo</li>
    </ol>

@stop


@section('content')

<div class="box box-primary">
  <div class="box-header with-border box-default">
    <strong>Nuevo Servidor</strong>
  </div>
    
  <div class="panel-body">
    <div class="row">

			{!! Form::open(['route' => 'servidores.store']) !!}

				@include('admin.complementos.servidores.partials.form')

			{!! Form::close() !!}
		</div>
	</div>
</div>


@endsection