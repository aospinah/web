@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mb-5 mt-2">
					<a href="{{ route('welcome') }}" class="btn btn-danger float-left">Volver</a>
					<h1 class="float-left ml-4">OAs</h1>
				</div>
				<div class="pt-4">
					@if ( count($oas) > 0 )
						<table class="table table-hover">
							<thead class="thead-dark">
								<tr>
									<th>Nombre</th>
									<th>Área fundamental</th>
									<th>Tema</th>
									<th>Población Objetivo</th>
									<th>Creador</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($oas as $oa)
									<tr>
										<td>{{ $oa->oa_title }}</td>
										<td>{{ $oa->taxonomy->tax_name }}</td>
										<td>{{ $oa->topic->top_name }}: {{ $oa->topic->top_objective }}</td>
										<td>{{ $oa->target->tar_description }}</td>
										<td><a href="{{ route('users.show', $oa->user) }}">{{ $oa->user->user_name }}</a></td>
										{{-- <td>{!! html_entity_decode($oa->oa_description, ENT_QUOTES, 'UTF-8') !!}</td> --}}
										<td>
											<a href="{{ route('oas.show', $oa->oa_id) }}" class="btn btn-sm btn-primary rounded">Ver</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<p>Aún no hay OAs creados.</p>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection