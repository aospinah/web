@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mb-5 mt-2">
					<a href="{{ route('users.index') }}" class="btn btn-danger float-left">Regresar</a>
					<h1 class="float-left ml-4">Usuario</h1>
				</div>
			</div>
			@if ( count($user) > 0 )
				<div class="col-4">
					<div class="card shadow rounded" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">{{ $user->user_name }} <span class="badge badge-success" data-toggle="tooltip" data-placement="right" title="Cantidad de OAs creados">{{ count($user->oas) }}</span><br>
								{{ $user->user_email }}
							</h5>
							<p class="card-text">
								{{ $user->user_city }}
								<br>
								{{ $user->user_ocupation }}
							</p>
							<a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning rounded">Editar</a>
							{!! Form::open(['route' => ['users.destroy', $user], 'method' => 'DELETE', 'style' => 'display: inline-block;']) !!}
								<button class="btn btn-sm btn-danger rounded">Eliminar</button>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<div class="col-8">
					@if ( count($user->oas) > 0 )
						<div class="list-group shadow">
							@foreach ($user->oas as $oa)
								<a href="{{ route('oas.show', $oa->oa_id) }}" class="list-group-item list-group-item-action">
									<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1"><strong>Titulo: {{ $oa->oa_title }} {{ ($oa->oa_access_per) ? '('.$oa->oa_access_per.'% AW)' : '' }}</strong></h5>
										<small><span class="badge badge-pill badge-primary">{{ $oa->target->tar_description }}</span></small>
									</div>
									<p class="mb-1">Área fundamental: {{ $oa->taxonomy->tax_name }}</p>
									<small><b>{{ $oa->topic->top_name }}:</b> {{ $oa->topic->top_objective }}
									</small>
								</a>
							@endforeach
						</div>
					@else
						<div class="alert alert-warning" role="alert">
							Este usuario aún no ha creado OAs.
						</div>
					@endif
				</div>
			@else
				<div class="col-12">
					<p>Aún no hay usuarios creados.</p>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection