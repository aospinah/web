<div class="form-group">
	{{ Form::label('oa_title', 'Nombre') }}
	{{ Form::text('oa_title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('oa_tax_id', 'Taxonomia') }}
	{{ Form::select('oa_tax_id', $taxs, null, ['placeholder' => 'Selecciona Taxonomia...', 'class' => 'form-control', 'data_route' => route('gettopics', ''), 'id' => 'oa_tax_id']) }}
</div>

<div class="form-group">
	{{ Form::label('oa_top_id', 'Tema') }}
	{{ Form::select('oa_top_id', [], null, ['placeholder' => 'Selecciona Tema...', 'class' => 'form-control', 'data_route' => route('getobjective', ''), 'id' => 'oa_top_id']) }}

	<div id="obj_topic" class="mt-2 mb-5 alert alert-secondary" role="alert">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime assumenda et, optio repudiandae quaerat. Saepe perspiciatis ipsa, sint, nulla ex officia cupiditate aperiam dolores debitis quidem rerum iste maxime, facere.
	</div>
</div>



<div class="form-group">
	{{ Form::label('oa_tar_id', 'Población Objetivo') }}
	{{ Form::select('oa_tar_id', $tars, null, ['placeholder' => 'Selecciona Población...', 'class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('oa_path', 'Ubicación') }}
	{{ Form::text('oa_path', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('oa_description', 'Descripción') }}
	{{ Form::textarea('oa_description', null, ['class' => 'form-control']) }}
</div>

{{ Form::hidden('oa_user_id', Auth::user()->user_id) }}

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
</div>

<h1>Drag & Drop - Inside</h1>
<div class="cont-editor" id="cont-editor">
	<div class="cont-edit-controls">
		<div class="each-editor-text" id="each-editor-text">
			<div><a href="#" class="op-text" data-w="align" data-option="justify"><i class="fa fa-align-justify"></i></a></div>
			<div><a href="#" class="op-text" data-w="align" data-option="left"><i class="fa fa-align-left"></i></a></div>
			<div><a href="#" class="op-text" data-w="align" data-option="center"><i class="fa fa-align-center"></i></a></div>
			<div><a href="#" class="op-text" data-w="align" data-option="right"><i class="fa fa-align-right"></i></a></div>
			<div><a href="#" class="op-text" data-w="weight" data-option="bold"><i class="fa fa-bold"></i></a></div>
		</div>
	</div>
	<div class="cont-edit" id="text-save">
	</div>
</div>
	<div id="options" class="cont-drag">
		<div class="item-move">
	      <div class="btns-options">
	      	<span class="fa fa-arrows-alt icon-move" aria-hidden="true"></span>
	      	<span class="fa fa-times icon-delete"></span>
	      </div>
	      <h1 class="drag-text" id="drag-title" data-placeholder="Editar Titulo" data-class="edit-text title">Titulo</h1>
	    </div>
	    <div class="item-move">
	      <div class="btns-options">
	      	<span class="fa fa-arrows-alt icon-move" aria-hidden="true"></span>
	      	<span class="fa fa-times icon-delete"></span>
	      </div>
	      <h3 class="drag-text" id="drag-subtitle" data-placeholder="Editar Subtitulo" data-class="edit-text subtitle">Subtitulo</h3>
	    </div>
	    <div class="item-move">
	      <div class="btns-options">
	      	<span class="fa fa-arrows-alt icon-move" aria-hidden="true"></span>
	      	<span class="fa fa-times icon-delete"></span>
	      </div>
	      <p class="drag-text" id="drag-text" data-placeholder="Editar Parrafo" data-class="edit-text phar">Parrafo</p>
	    </div>
	    <div class="item-move">
	      <div class="btns-options">
	      	<span class="fa fa-arrows-alt icon-move" aria-hidden="true"></span>
	      	<span class="fa fa-times icon-delete"></span>
	      </div>
	      <img class="drag-text" src="{{ asset('img/a.png') }}" draggable="true" id="drag-img" data-placeholder="Imagen" data-class="edit-text image" />
	    </div>
		<select name="contraste" id="contraste">
			<option value="1" class="option-data" data-bg="white" data-color="black">Blanco / Negro</option>
			<option value="2" class="option-data" data-bg="black" data-color="white">Negro / Blanco</option>
			<option value="3" class="option-data" data-bg="yellow" data-color="black">Amarillo / Negro</option>
			<option value="4" class="option-data" data-bg="black" data-color="yellow">Negro / Amarillo</option>
		</select>
	</div>
<a href="#" id="enviar">Enviar</a>
