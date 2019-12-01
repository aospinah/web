@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mb-5 mt-2">
					<h1 class="float-left mr-4">OAs</h1>
					<a href="{{ route('oas.create') }}" class="btn btn-success float-left">Crear OA</a>
				</div>
				@if ( count($oas) > 0 )
					<div>
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th>Nombre</th>
									<th>Taxonomia</th>
									<th>Tema</th>
									<th>Población Objetivo</th>
									<th>Ubicación</th>
									{{-- <th>Descripción</th> --}}
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($oas as $oa)
									<tr>
										<td>{{ $oa->oa_title }}</td>
										<td>{{ $oa->oa_tax_id }}</td>
										<td>{{ $oa->oa_top_id }}</td>
										<td>{{ $oa->oa_tar_id }}</td>
										<td>{{ $oa->oa_path }}</td>
										{{-- <td>{!! html_entity_decode($oa->oa_description, ENT_QUOTES, 'UTF-8') !!}</td> --}}
										<td>
											<a href="{{ route('oas.show', $oa->oa_id) }}" class="btn btn-sm btn-primary rounded">Ver</a>
											<a href="{{ route('oas.edit', $oa->oa_id) }}" class="btn btn-sm btn-warning rounded">Editar</a>
											{!! Form::open(['route' => ['oas.destroy', $oa->oa_id], 'method' => 'DELETE', 'style' => 'display: inline-block;']) !!}
												<button class="btn btn-sm btn-danger rounded">Eliminar</button>
											{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>	
					</div>
				@else
					<p>Aún no hay OAs creados.</p>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection