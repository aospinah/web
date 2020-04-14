@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Crear Usuario</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				{!! Form::open(['route' => ['users.store'], 'method' => 'POST', 'files' => true]) !!}
					@include('admin.creator.partials.form')
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection