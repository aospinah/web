@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mb-5 mt-2">
					<h1 class="float-left mr-4">Usuarios</h1>
					<a href="{{ route('users.create') }}" class="btn btn-success float-left">Crear Usuario</a>
				</div>
				@if ( count($users) > 0 )
					<div>
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Cantidad de Oas</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{ $user->user_name }}</td>
										<td>{{ $user->user_email }}</td>
										<td>{{ count($user->oas) }}</td>
										{{-- <td>{!! html_entity_decode($user->oa_description, ENT_QUOTES, 'UTF-8') !!}</td> --}}
										<td>
											<a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-primary rounded">Ver</a>
											<a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning rounded">Editar</a>
											{!! Form::open(['route' => ['users.destroy', $user], 'method' => 'DELETE', 'style' => 'display: inline-block;']) !!}
												<button class="btn btn-sm btn-danger rounded">Eliminar</button>
											{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<p>Aún no hay usuarios creados.</p>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection