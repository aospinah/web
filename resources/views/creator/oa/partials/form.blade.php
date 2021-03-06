<div class="tab">
	<h1>Caracterización y Conceptualización</h1>
	<div class="form-group st1">
		{{ Form::label('oa_title', 'Nombre') }}
		{{ Form::text('oa_title', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group st2">
		{{ Form::label('oa_tax_id', 'Área fundamental') }}
		<div class="tooltip"><span>?</span>
			<span class="tooltiptext">Asignatura / Materia</span>
		</div>
		{{ Form::select('oa_tax_id', $taxs, null, ['placeholder' => 'Selecciona Área fundamental...', 'class' => 'form-control', 'data_route' => route('gettopics', ''), 'id' => 'oa_tax_id']) }}
	</div>

	<div class="form-group st2">
		{{ Form::label('oa_top_id', 'Tema') }}
		{{ Form::select('oa_top_id', $tops, null, ['placeholder' => 'Selecciona Tema...', 'class' => 'form-control', 'data_route' => route('getobjective', ''), 'id' => 'oa_top_id']) }}
	</div>
	<div class="form-group st3">
		{{ Form::label('oa_top_text', 'Objetivo Educativo') }}
		{{ Form::textarea('oa_top_text', null, ['class' => 'form-control mt-2', 'id' => 'obj_topic']) }}
	</div>



	<div class="form-group st4">
		{{ Form::label('oa_tar_id', 'Población Objetivo') }}
		{{ Form::select('oa_tar_id', $tars, null, ['placeholder' => 'Selecciona Población...', 'class' => 'form-control']) }}
	</div>

	<div class="form-group st5">
		{{-- {{ Form::label('oa_path', 'Ubicación') }} --}}
		{{ Form::hidden('oa_path', 'path', ['class' => 'form-control']) }}
	</div>
</div>

<div class="tab">
	<h1>Diseño del Recurso</h1>
	<p>Arrastra y suelta los elementos en el espacio "Contenido del OA"</p>
	<div class="form-group">
		<div class="cont_all_options">
			<div id="options" class="cont-drag">
				<div class="item-move separator">
					<div class="btns-options">
						<span class="fa fa-edit icon-edit" data-toggle="modal" data-target="#modalEach"></span>
						<span class="fa fa-arrows-alt icon-move" aria-hidden="true"></span>
						<span class="fa fa-times icon-delete"></span>
					</div>
					<h1 class="drag-text" id="drag-title" data-placeholder="Editar Titulo" data-class="edit-text title" draggable="true">Titulo</h1>
				</div>
				<div class="item-move separator">
					<div class="btns-options">
						<span class="fa fa-edit icon-edit" data-toggle="modal" data-target="#modalEach"></span>
						<span class="fa fa-arrows-alt icon-move" aria-hidden="true"></span>
						<span class="fa fa-times icon-delete"></span>
					</div>
					<h3 class="drag-text" id="drag-subtitle" data-placeholder="Editar Subtitulo" data-class="edit-text subtitle">Subtitulo</h3>
				</div>
				<div class="item-move separator">
					<div class="btns-options">
						<span class="fa fa-edit icon-edit" data-toggle="modal" data-target="#modalEach"></span>
						<span class="fa fa-arrows-alt icon-move" aria-hidden="true"></span>
						<span class="fa fa-times icon-delete"></span>
					</div>
					<p class="drag-text" id="drag-text" data-placeholder="Editar Parrafo" data-class="edit-text phar">Parrafo</p>
				</div>
				{{-- <div class="item-move separator">
					<div class="btns-options">
						<span class="fa fa-arrows-alt icon-move" aria-hidden="true"></span>
						<span class="fa fa-times icon-delete"></span>
					</div>
					<img class="drag-text image" src="{{ asset('img/a.png') }}" draggable="true" id="drag-img" data-placeholder="Imagen" data-class="edit-text image" />
				</div> --}}
			</div>
			<div>
				<div class="separator">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalImg">Insertar Imagen</button>
				</div>
				<select name="contraste" id="contraste">
					@isset ( $oa->oa_back )
						<option value="1" {{ $oa->oa_back == "1" ? 'selected="selected"' : '' }} class="option-data" data-bg="white" data-color="black">Blanco / Negro</option>
						<option value="2" {{ $oa->oa_back == "2" ? 'selected="selected"' : '' }} class="option-data" data-bg="black" data-color="white">Negro / Blanco</option>
						<option value="3" {{ $oa->oa_back == "3" ? 'selected="selected"' : '' }} class="option-data" data-bg="yellow" data-color="black">Amarillo / Negro</option>
						<option value="4" {{ $oa->oa_back == "4" ? 'selected="selected"' : '' }} class="option-data" data-bg="black" data-color="yellow">Negro / Amarillo</option>
					@else
						<option value="1" class="option-data" data-bg="white" data-color="black" selected="selected">Blanco / Negro</option>
						<option value="2" class="option-data" data-bg="black" data-color="white">Negro / Blanco</option>
						<option value="3" class="option-data" data-bg="yellow" data-color="black">Amarillo / Negro</option>
						<option value="4" class="option-data" data-bg="black" data-color="yellow">Negro / Amarillo</option>
					@endif
				</select>
				{{ Form::select('oa_font', array('Arial' => 'Arial', 'Verdana' => 'Verdana'), null, ['id' => 'oa_font']) }}
			</div>
		</div>
		{{-- {{ Form::label('oa_description', 'Descripción') }}
		{{ Form::textarea('oa_description', null, ['class' => 'form-control', 'data-intro' =>'Hello step one!', 'id' => 'editor']) }}
		{{ Form::hidden('oa_back', null, ['id' => 'oa_back']) }} --}}
		{{ Form::hidden('oa_description', 'Prueba', ['id' => 'oa_description']) }}
		{{ Form::hidden('oa_back', '1', ['id' => 'oa_back']) }}
		<div class="cont-editor" id="cont-editor">
			{{-- <div class="cont-edit-controls">
				<div class="each-editor-text" id="each-editor-text">
					<div><a href="#" class="op-text" data-w="align" data-option="justify"><i class="fa fa-align-justify"></i></a></div>
					<div><a href="#" class="op-text" data-w="align" data-option="left"><i class="fa fa-align-left"></i></a></div>
					<div><a href="#" class="op-text" data-w="align" data-option="center"><i class="fa fa-align-center"></i></a></div>
					<div><a href="#" class="op-text" data-w="align" data-option="right"><i class="fa fa-align-right"></i></a></div>
					<div><a href="#" class="op-text" data-w="weight" data-option="bold"><i class="fa fa-bold"></i></a></div>
				</div>
			</div> --}}
			<div id="cont-text-save" style="width: 100%;">
				@php
					if( isset($oa->oa_description) ){
						echo $oa->oa_description;
					}else{
						echo '<div class="cont-edit" id="text-save" style="padding: 15px;">
						</div>';
					}
				@endphp
			</div>
		</div>
	</div>
	{{ Form::hidden('oa_user_id', Auth::user()->user_id) }}
	{{ Form::hidden('redirect', route('oas.index'), [ 'id' => 'redirect' ]) }}
	<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-primary d-none', 'id' => 'submitForm']) }}
	</div>
</div>

<div class="tab">
	<h1>Visualización y Verificación</h1>
	<div style="position: relative;">
		<input type="hidden" id="base-url" value="{{ url('/') }}">
		<a href="http://accessmonitor.acessibilidade.gov.pt/amp/results/" id="url_verify" target="_blank" class="btn btn-success" style="position: absolute; top: 1px; right: 1px;">Verificar</a>
		<div class="preview" style="border: 1px solid #000; border-radius: 5px; padding: 15px; margin-bottom: 20px;"></div>
		<div class="container d-none" id="all-res-access">
	        <div class="row">
	            <div class="col-12" id="result-access-load">
	                <div class="text-center alert alert-dark" role="alert">
	                    <i class="fa fa-2x fa-spinner fa-spin" id="icon-result-false"></i>
	                    <h5 id="result-false">Calculando accesibilidad</h5>
	                </div>
	            </div>
	        </div>
	        <div class="row d-none" id="result-access">
	            <div class="col-4">
	                <div class="text-center alert alert-danger" role="alert">
	                	<i class="fa fa-2x fa-exclamation-circle"></i>
	                    <span class="fa-2x" id="perc-errors"></span>
	                    <h5>Errores</h5>
	                </div>
	            </div>
	            <div class="col-4">
	                <div class="text-center alert alert-warning" role="alert">
	                	<i class="fa fa-2x fa-exclamation-triangle"></i>
	                    <span class="fa-2x" id="perc-alerts"></span>
	                    <h5>Advertencias</h5>
	                </div>
	            </div>
	            <div class="col-4">
	                <div class="text-center alert alert-success" role="alert">
	                	<i class="fa fa-2x fa-exclamation"></i>
	                    <span class="fa-2x" id="perc-features"></span>
	                    <h5>Sugerencias</h5>
	                </div>
	            </div>
	            <div class="col-12">
	            	<div class="text-center alert alert-primary" role="alert">
	                	<i class="fa fa-2x fa-check"></i>
	                    <span class="fa-2x" id="perc-total"></span>
	                    <h5>Accesible</h5>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<div class="tab">
	<h1>Evaluación</h1>
	{{-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdjIA1N3YlIkS5ghW7W9ngmjzOuyJEdUIbwRdJlegYZBmzfxw/viewform?embedded=true" width="640" height="1015" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe> --}}
	<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdjIA1N3YlIkS5ghW7W9ngmjzOuyJEdUIbwRdJlegYZBmzfxw/viewform?embedded=true" width="640" height="1015" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
</div>

<div class="modal fade" id="modalImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Seleccionar imagen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input class="form-control" id="input-img" type="file">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="txt-alt" placeholder="Texto alternativo" />
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="insert-img">Insertar Imagen</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalEach" tabindex="-1" role="dialog" aria-labelledby="eachModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="eachModalLabel">Editar elemento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					{{ Form::select('pt', array('12pt' => '12pt', '14pt' => '14pt'), null, ['id' => 'pt', 'class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::select('align', array('left' => 'Izquierda', 'center' => 'Centro', 'right' => 'Derecha'), null, ['id' => 'align', 'class' => 'form-control']) }}
				</div>
				{{ Form::hidden('element-edit', null, ['id' => 'element-edit']) }}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="accept-change">Aceptar</button>
			</div>
		</div>
	</div>
</div>

<div style="overflow:auto;">
	<div style="float:right;">
		<button type="button" id="prevBtn" class="btn btn-default" onclick="nextPrev(-1)">Anterior</button>
		<button type="button" id="nextBtn" calignlass="btn btn-success" onclick="nextPrev(1)">Siguiente</button>
	</div>
</div>