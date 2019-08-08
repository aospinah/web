@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mb-5 mt-2">
					<h1 class="float-left mr-4">{{ $oa->oa_title }}</h1>
					<a href="{{ route('oas.edit', $oa->oa_id) }}" class="btn btn-warning float-left mr-2">Editar</a>
					<a href="{{ route('oas.destroy', $oa->oa_id) }}" class="btn btn-danger float-left">Eliminar</a>
				</div>
			</div>
			<div class="col-12">
				<div>
					<p>{{ $oa->oa_top_text }}</p>
				</div>
				<div class="prev_content">
					{!! html_entity_decode($oa->oa_description, ENT_QUOTES, 'UTF-8') !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection