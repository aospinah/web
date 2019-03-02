@extends('layouts.app')

@section('content')
	<div class="mb-5">
		<a href="{{ route('oas.create') }}" class="btn btn-success float-left mr-4">Crear OA</a>
		<h1>OAS</h1>
	</div>
	<div>
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th>Nombre</th>
					<th>Taxonomia</th>
					<th>Tema</th>
					<th>Población Objetivo</th>
					<th>Ubicación</th>
					<th>Descripción</th>
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
						<td>{{ $oa->oa_description }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection