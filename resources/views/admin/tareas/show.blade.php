@extends('adminlte::page')

@section('title', 'Gestión - Tareas')


@section('css')
	<link rel="stylesheet" href="{{ asset('css/resources/prism/prism4.css') }}">
@endsection


@section('content_header')
  <h1>
    Gestionar Clientes
    <!--<small>Listado</small>-->
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('tareas.index')}}">Tareas</a></li>
    <li class="active">Ver</li>
  </ol>


@stop
@section('content')

<div class="box box-primary">
	<div class="box-header with-border box-default">
	   <strong> Ver Tarea </strong>
	</div>
		
	<div class="panel-body">
	    	<div class="row">
					<div class="col-md-12">
						<div class="row col-md-12">
							<div class="form-group pull-right">
										<a href="{{ route('tareas.index') }}" type="button" class="btn btn btn-default">
											<span class="fa fa-list">
											</span>
												Listado
										</a>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						
						<p> <strong>Titulo Tarea:</strong> {{ $tarea->titulotarea}}</p>

						<p> <strong>Fecha:</strong> {{ $tarea->fecha }}</p>

						<p> <strong>Asignado:</strong> {{ $tarea->usuario_alta }}</p>

						<p> <strong>Motivo:</strong> {{ $tarea->motivo->descripcion }}</p>

						@if($tarea->servidor_id)
							<p> <strong>Servidor:</strong> {{ $tarea->servidor->descripcion }}</p>
						@endif
						
						@if($tarea->base_id)
							<p> <strong>Base de Datos:</strong> {{ $tarea->base->descripcion }}</p>
						@endif

						@if($tarea->nombrearchivo)
							<p> <strong>Nombre Archivo Nuevo/Modificado:</strong> {{ $tarea->nombrearchivo }}</p>
						@endif

						@if($tarea->rutaarchivo)
							<p> <strong>Ruta del Archivo:</strong> {{ $tarea->rutaarchivo }}</p>
						@endif

						@if($tarea->codigoactual)
							<p> <strong>Fragmento de Codigo a modificar:</strong> </p>

							<pre><code class="language-sql line-numbers">{{ $tarea->codigoactual }}</code></pre>
						@endif
						@if($tarea->codigomodificado)
							<br>
							<p> <strong>Modificación:</strong> </p>

							<pre><code class="language-sql line-numbers">{{ $tarea->codigomodificado }}</code></pre>
							<br>
						@endif

						@if($tarea->observaciones)

							<p> <strong>Observaciones:</strong> {{ $tarea->observaciones }}</p>
						@endif

						<p> <strong>Estado:</strong> {{ $tarea->estado }}</p>
						

						
					</div>

				</div>
	</div>
</div>

@endsection





@push('js')
	
	<script src="{{ asset('js/resources/prism/prism4.js') }}"></script>

	<script type="text/javascript">

		(function(){
			if (typeof self === 'undefined' || !self.Prism || !self.document) {
				return;
			}

			if (!Prism.plugins.toolbar) {
				console.warn('Copy to Clipboard plugin loaded before Toolbar plugin.');

				return;
			}

			var ClipboardJS = window.ClipboardJS || undefined;

			if (!ClipboardJS && typeof require === 'function') {
				ClipboardJS = require('clipboard');
			}

			var callbacks = [];

			if (!ClipboardJS) {
				var script = document.createElement('script');
				var head = document.querySelector('head');

				script.onload = function() {
					ClipboardJS = window.ClipboardJS;

					if (ClipboardJS) {
						while (callbacks.length) {
							callbacks.pop()();
						}
					}
				};

				//script.src = 'https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js';
				script.src = '{{ asset('js/resources/prism/clipboard.min.js') }}';
				head.appendChild(script);
			}

			Prism.plugins.toolbar.registerButton('copy-to-clipboard', function (env) {
				var linkCopy = document.createElement('a');
				linkCopy.textContent = 'Copiar Codigo';

				if (!ClipboardJS) {
					callbacks.push(registerClipboard);
				} else {
					registerClipboard();
				}

				return linkCopy;

				function registerClipboard() {
					var clip = new ClipboardJS(linkCopy, {
						'text': function () {
							return env.code;
						}
					});

					clip.on('success', function() {
						linkCopy.textContent = 'Copiado!';

						resetText();
					});
					clip.on('error', function () {
						linkCopy.textContent = 'Press Ctrl+C to copy';

						resetText();
					});
				}

				function resetText() {
					setTimeout(function () {
						linkCopy.textContent = 'Copiar Codigo';
					}, 5000);
				}
			});
		})();
	
		
	</script>
@endpush

           
             