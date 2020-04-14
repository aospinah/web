<div class="form-group">
	{{ Form::label('user_name', 'Nombres') }}
	{{ Form::text('user_name', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('user_slug', 'Slug') }}
	{{ Form::text('user_slug', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('user_email', 'Correo') }}
	{{ Form::text('user_email', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('user_ocupation', 'Ocupación') }}
	{{ Form::text('user_ocupation', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('user_institution', 'Institución') }}
	{{ Form::text('user_institution', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('user_city', 'Ciudad') }}
	{{ Form::text('user_city', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('user_password', 'Contraseña') }}
	{{ Form::password('user_password', null, ['class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>