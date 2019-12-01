@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
					<h1>Crear OA</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-9">
				{!! Form::open(['route' => 'oas.store', 'method' => 'POST', 'id' => 'regForm' ]) !!}
					<div style="text-align:center;margin-top:40px;">
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
	{{-- <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script> --}}

	<script>
		window.addEventListener('load', function(){

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
				const url = this.attributes.data_route.value

				fetch(url+'/'+this.value, {
			        method: 'GET'
			    })
			    .then(function(response) {
			        return response.json();
			    })
			    .then(function(data) {
			    	const eleTopic = document.querySelector('#obj_topic')

			    	data.forEach(function(elem){
			    		eleTopic.innerHTML = elem.top_objective
			    	})
			    })
			    .catch(function(err) {
			        console.error(err);
			    })
			})
		}, false)
	</script>

	{{-- SORTABLE --}}
	{{-- <script type="text/javascript">
		var el = document.getElementById('text-save')
		var options = document.getElementById('options')
		var selectedText = null

		Sortable.create(options, {
		    group: {
		        name: 'shared',
		        pull: 'clone',
		        put: false // Do not allow items to be put into this list
		    },
		    onClone: function (evt) {
				var origEl = evt.item;
				var cloneEl = evt.clone;

				let dataPlaceholder = origEl.children[1].getAttribute("data-placeholder")
				let dataClass = origEl.children[1].getAttribute("data-class")

				for (let i = origEl.children[1].attributes.length - 1; i >= 0; i--) {
					origEl.children[1].removeAttribute(origEl.children[1].attributes[i].name)
				}

				origEl.children[1].innerHTML = ''
				origEl.children[1].setAttribute('placeholder', dataPlaceholder)
				origEl.children[1].setAttribute('class', dataClass)

				origEl.children[1].setAttribute('contenteditable', 'true')

				origEl.children[1].addEventListener('click', function(elem){
					selectedText = origEl.children[1]
				}, false)
			},
			animation: 150,
		    sort: false, // To disable sorting: set sort to false
		});

		Sortable.create(el, {
		    group: 'shared',
		    animation: 150
		});

		window.addEventListener('load', function(){
			const deleteBtn = document.querySelectorAll(".icon-delete")
			const textEdit = document.querySelectorAll(".edit-text")

			deleteBtn.forEach(function(element){
				element.addEventListener('click', function(e){
					e.preventDefault()
					alert('Delete')
					e.target.parentElement.parentElement.remove()
				})
			})
		}, false)

		// op-text click
		let opText = document.getElementsByClassName('op-text')
		for(let i = 0; i < opText.length; i++){			
			opText[i].addEventListener('click', function(e){

				e.preventDefault()

				selectedText.focus()

				let wSelected = opText[i].getAttribute('data-w')
				let opSelected = opText[i].getAttribute('data-option')

				if(wSelected == 'align'){

					selectedText.style.textAlign = opSelected

				}else if(wSelected == 'weight'){

					document.execCommand(opSelected)

				}
			}, false)
		}

		// Background Change

		let selectBack = document.getElementById('contraste')

		for (let i = selectBack.options.length - 1; i >= 0; i--) {
			selectBack.options[i].style.backgroundColor = selectBack.options[i].getAttribute('data-bg')
			selectBack.options[i].style.color = selectBack.options[i].getAttribute('data-color')
		}

		selectBack.addEventListener('change', () => {

			let indexSelected = selectBack.selectedIndex
			let optionTag = selectBack.options

			let dataBgOption = optionTag[indexSelected].getAttribute('data-bg')
			let dataCoOption = optionTag[indexSelected].getAttribute('data-color')

			selectBack.style.backgroundColor = dataBgOption
			selectBack.style.color = dataCoOption

			let elementBack = document.getElementById('text-save')
			elementBack.style.backgroundColor = dataBgOption
			elementBack.style.color = dataCoOption

		}, false)

		document.getElementById('text-save').addEventListener('paste', (e) => {
			e.preventDefault()

			let clipboardData = e.clipboardData || window.clipboardData
			let pastedData = clipboardData.getData('text/plain')

			document.execCommand('insertHTML', false, pastedData)

			console.log(pastedData)
		}, false)
	</script> --}}
	
	
@endsection