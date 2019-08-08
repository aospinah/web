@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row cont_img_head">
            <div class="col-12">
                <img src="{{ asset('img/img1.png') }}" alt="">
            </div>
        </div>
        <div class="row cont_info_sis mb-4">
            <div class="col-6">
                <h1 class="text-center title_msg">¡Crea objetos de aprendizaje accesibles sin ser experto!</h1>
            </div>
            <div class="col-6"></div>
        </div>
        <div class="row cont_call_action">
            <div class="col-6">
                <div class="cont_call_action_img"></div>
            </div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-center cont_call_action_a">
                {{-- Ya podrás construir tus recursos educativos accesibles sin necesidad de ser un experto ni en temas de educación ni en temas de recursos tecnologicos inscribete y sigue los pasos --}}
                <div>Podrás construir tus recursos educativos accesibles  ni en temas de educación ni en temas de recursos tecnologicos
                    <ul>
                        <li>Sin ser experto</li>
                    </ul>
                    @guest
                        <h3>Inscribete y sigue los pasos</h3>
                    @endauth
                </div>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-block">¡Registrarte Ahora!</a>
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg btn-block">Inicia Sesión</a>
                @else
                    <a href="{{ route('oas.index') }}" class="btn btn-primary btn-lg btn-block">Ver OAs</a>
                    <a href="{{ route('oas.create') }}" class="btn btn-success btn-lg btn-block">Crear OAs</a>
                @endauth
            </div>
        </div>
    </div>

    <p>
        @php
            // $prueba = serialize('<div>Andrés</div>');
        @endphp
        {{-- {{ $prueba }} --}}
        {{-- {{ unserialize( $prueba ) }} --}}
    </p>
@endsection