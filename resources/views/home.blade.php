@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Escritorio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('oas.index') }}" class="btn btn-primary btn-lg">Ver OAs</a>
                    <a href="{{ route('oas.create') }}" class="btn btn-success btn-lg">Crear OAs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
