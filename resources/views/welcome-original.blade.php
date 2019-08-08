<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Alejandra
                </div>

                <div class="container-fluid">
                    <div class="row cont_img_head">
                        <div class="col-12">
                            <img src="{{ asset('img/img1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row cont_info_sis">
                        <div class="col-6">
                            <h1>¡Crea objetos de aprendizaje accesibles sin ser experto!</h1>
                        </div>
                        <div class="col-6"></div>
                    </div>
                    <div class="row cont_call_action">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <a href="{{ route('login') }}" class="btn btn-success btn-block">Iniciar Sesión</a>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">¡Registrarse Ahora!</a>
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

                <div class="links">
                    <a href="{{ route('oas.index') }}">OAS</a>
                </div>
            </div>
        </div>
    </body>
</html>
