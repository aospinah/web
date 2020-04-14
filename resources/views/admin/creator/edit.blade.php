@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Editar Usuario</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				{!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
					@include('admin.creator.partials.form')
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection