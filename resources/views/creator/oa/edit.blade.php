@extends('layouts.app')

@section('styles')
	{{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('css/enjoyhint.css') }}"> --}}
	{{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script> --}}
	{{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/balloon/ckeditor.js"></script> --}}
	{{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/balloon-block/ckeditor.js"></script> --}}
	{{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/decoupled-document/ckeditor.js"></script> --}}
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mb-5 mt-2">
					<a href="{{ url()->previous() }}" class="btn btn-primary float-left"><i class="fa fa-chevron-left"></i></a>
					<h1 class="float-left ml-4 mr-4">Editar OA</h1>
					<a href="{{ route('oas.destroy', $oa->oa_id) }}" class="btn btn-danger float-left">Eliminar</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-9">
				{!! Form::model($oa, ['route' => ['oas.update', $oa], 'method' => 'PUT', 'id' => 'regForm' ]) !!}
					<div style="text-align:center;margin-top:40px;" data-intro='Hello step one!'>
						<div style="display: inline-block;">
							<span class="step"></span>
							<p>Etapa 1<br>Caracterización</p>
						</div>
						<div style="display: inline-block;">
							<span class="step"></span>
							<p>Etapa 2<br>Diseño</p>
						</div>
						<div style="display: inline-block;">
							<span class="step"></span>
							<p>Etapa 3<br>Visualización y Verificación</p>
						</div>
						<div style="display: inline-block;">
							<span class="step"></span>
							<p>Etapa 4<br>Evaluación</p>
						</div>
					</div>
					@include('creator.oa.partials.form')
					<input type="hidden" id="top_id_act" data-top-id="{{ $oa->oa_top_id }}" data-top-text="{{ $oa->oa_top_text }}">
				{!! Form::close() !!}
			</div>
			<div class="col-3" style="background: #fff; padding: 40px 15px;">
				<h2 style="text-align: center;">Ayudas</h2>
				<div style="position: sticky; top: 10px;">
					<button class="accordion">Etapa 1</button>
					<div class="panel">
						<p>Describir los aspectos educativos y contextuales del recurso que se va a crear.</p>
						<p><b>Tema:</b> Temática del recurso educativo.</p>
						<p><b>Objetivo educativo:</b> Intención de aprendizaje, lo que el estudiante va a adquirir al final del recurso educativo.</p>
						<p><b>Población objetivo:</b> Discapacidad presentada en la población.</p>
					</div>

					<button class="accordion">Etapa 2</button>
					<div class="panel">
						<p>Forma y estructura del contenido del recurso educativo.</p>
					</div>

					<button class="accordion">Etapa 3</button>
					<div class="panel">
						<p>Representar y mostrar el etapa de diseño.</p>
					</div>
					<button class="accordion">Etapa 4</button>
					<div class="panel">
						<p>Verificación de la eficacia de la metodologia.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection

@section('script')
	@parent
	{{-- <script src="{{ asset('js/enjoyhint.js') }}"></script> --}}

 	<script>
 		// window.addEventListener('load', function(){
 		// });
 	</script>

	<script>
		window.addEventListener('load', function(){

			// document.querySelector('#editor_ifr').style.background = '{{ $oa->oa_back }}';

			const selTaxo = document.querySelector('#oa_tax_id')

			selTaxo.addEventListener('change', function(evt){
				const url = this.attributes.data_route.value

				fetch(url+'/'+this.value, {
			        method: 'GET'
			    })
			    .then(function(response) {
			        return response.json();
			    })
			    .then(function(data) {
			    	const eleTopic = document.querySelector('#oa_top_id')

			    	console.log(data)

			    	eleTopic.innerHTML = ''

			    	let eleDef = document.createElement('option')
		        	eleDef.setAttribute('value', '')
		        	eleDef.innerHTML = 'Selecciona Tema...'

		        	eleTopic.appendChild(eleDef)

			        data.forEach(function(elem){
			        	let eleOpt = document.createElement('option')
			        	eleOpt.setAttribute('value', elem.top_id)
			        	eleOpt.innerHTML = elem.top_name + ' (' + elem.top_grade + ')'

			        	eleTopic.appendChild(eleOpt)
			        })
			    })
			    .catch(function(err) {
			        console.error(err);
			    })
			})

			const selTop = document.querySelector('#oa_top_id')

			selTop.addEventListener('change', function(evt){
				const url = this.attributes.data_route.value;
		    	let eleTopic = document.querySelector('#obj_topic');
				const actTop = document.querySelector('#top_id_act');
				const idTop = actTop.getAttribute('data-top-id');

				if(this.value == idTop){
					const textTop = actTop.getAttribute('data-top-text');
					eleTopic.innerHTML = textTop;
				}else{
					fetch(url+'/'+this.value, {
				        method: 'GET'
				    })
				    .then(function(response) {
				        return response.json();
				    })
				    .then(function(data) {
				    	data.forEach(function(elem){
				    		eleTopic.innerHTML = elem.top_objective
				    	})
				    })
				    .catch(function(err) {
				        console.error(err);
				    })
				}

			})
		}, false)
	</script>
	
	
@endsection