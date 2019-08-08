<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/introjs.min.css') }}">


    @section('styles')
    @show
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Inicio
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarte') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarOa" href="{{ route('oas.index') }}" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('OAs') }}</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarOa">
                                    <a href="{{ route('oas.index') }}" class="dropdown-item">
                                        {{ __('Ver OAs') }}
                                    </a>
                                    <a href="{{ route('oas.create') }}" class="dropdown-item">
                                        {{ __('Crear OA') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->user_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- <main class="py-4 container"> --}}
            @yield('content')
        {{-- </main> --}}
        <footer style="margin-top: 50px; height: 100px; background: #ccc; width: 100%;"></footer>
    </div>
    @section('script')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/intro.min.js') }}"></script>
        <script src="https://cdn.tiny.cloud/1/6yk3lqem6rrq9tvbvab7vop10pualt3ng4v3r3vmxv28qtt4/tinymce/5/tinymce.min.js"></script>
        <script>
            tinymce.init({
                setup: (editor) => {
                    // console.log(editor);
                    // var toggleState = editor.getParam('toggleitem');
                    editor.ui.registry.addMenuButton('toogleColor', {
                        text: 'Fondo',
                        fetch: function (callback) {
                            var items = [
                                {
                                    type: 'menuitem',
                                    text: 'Blanco',
                                    onAction: () => {
                                        editor.setContent('<div>'+editor.getContent()+'</div>');
                                        // editor.dom.addClass(editor.dom.select('p'), 'someclass');

                                        document.querySelector('#editor_ifr').style.background = '#fff';
                                        document.querySelector('#oa_back').setAttribute("value", "#fff");
                                    }
                                },
                                {
                                    type: 'menuitem',
                                    text: 'Negro',
                                    onAction: () => {
                                        document.querySelector('#editor_ifr').style.background = '#000';
                                        document.querySelector('#oa_back').setAttribute("value", "#000");
                                    }
                                },
                                {
                                    type: 'menuitem',
                                    text: 'Amarillo',
                                    onAction: () => {
                                        document.querySelector('#editor_ifr').style.background = '#ffff00';
                                        document.querySelector('#oa_back').setAttribute("value", "#ffff00");
                                    }
                                }
                            ];
                            callback(items);
                        }
                    });
                },
                language: 'es',
                selector: 'textarea#editor',
                plugins: 'image casechange a11ychecker',
                // toolbar: 'undo redo fontselect fontsizeselect image styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
                toolbar: 'a11ycheck fontselect fontsizeselect image styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code toogleColor casechange forecolor backcolor',
                a11ychecker_allow_decorative_images: true,
                image_uploadtab: true,
                image_title: true, 
                automatic_uploads: true,
                file_picker_types: 'image',
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function() {
                        var file = this.files[0];

                            if(file.size <= 102400){
                                var reader = new FileReader();
                                reader.onload = function () {
                                    var id = 'blobid' + (new Date()).getTime();
                                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                    var base64 = reader.result.split(',')[1];
                                    var blobInfo = blobCache.create(id, file, base64);
                                    blobCache.add(blobInfo);
                                    cb(blobInfo.blobUri(), { title: file.name });
                                };
                                reader.readAsDataURL(file);
                            }else{
                                alert("Archivo demasiado grande!");
                                this.value = "";
                            };
                    };

                    input.click();
                },
                language_url: '/sis_aleja/aleja/public/language/es.js',
                init_instance_callback: function (editor) {
                    editor.on('Change', function (e) {
                        console.log('Dirty clicked:', e.target.getBody());
                    });
                }
            });

            // introJs().start();

            $('body').click(function(e){
                if(e.target.style.cssText === 'font-family: arial, helvetica, sans-serif;');
            });
        </script>

        {{-- Tabs Form --}}
        <script>
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab

            function showTab(n) {
              // This function will display the specified tab of the form...
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "flex";
              x[n].style.flexDirection = "column";
              //... and fix the Previous/Next buttons:
              if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
              } else {
                document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Enviar";
                document.getElementById("nextBtn").classList.remove("saveCont");
              } else if( n == 1 ) {
                document.getElementById("nextBtn").innerHTML = "Guardar y Continuar";
                document.getElementById("nextBtn").classList.add("saveCont");
                // document.querySelector('.saveCont').addEventListener('click', function(){
                //     alert('Hola');
                // });
              } else {
                document.getElementById("nextBtn").innerHTML = "Siguiente";
                document.getElementById("nextBtn").classList.remove("saveCont");
              }
              //... and run a function that will display the correct step indicator:
              fixStepIndicator(n)
            }

            function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("regForm").submit();
                    return false;
                }
                if(currentTab == 2){
                    document.querySelector('#submitForm').click();
                }
                var acc = document.getElementsByClassName("accordion");
                var accH = document.querySelector(".accordion.active");

                if(acc){
                    acc[currentTab].click();
                }
                if(accH){
                    accH.click();
                    accH.nextElementSibling.style.maxHeight = null;
                }
              // Otherwise, display the correct tab:
              showTab(currentTab);
            }

            function validateForm() {
              // This function deals with validation of the form fields
              var x, y, i, valid = true;
              x = document.getElementsByClassName("tab");
              y = x[currentTab].getElementsByTagName("input");
              // A loop that checks every input field in the current tab:
              for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                  // add an "invalid" class to the field:
                  y[i].className += " invalid";
                  // and set the current valid status to false
                  valid = false;
              }
            }
              // If the valid status is true, mark the step as finished and valid:
              if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
              }
              return valid; // return the valid status
            }

            function fixStepIndicator(n) {
              // This function removes the "active" class of all steps...
              var i, x = document.getElementsByClassName("step");
              for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
              }
              //... and adds the "active" class on the current step:
              x[n].className += " active";
            }
        </script>
        <script>
            window.addEventListener('load', function(){
                var acc = document.getElementsByClassName("accordion");
                var i;

                if(acc){
                    for (i = 0; i < acc.length; i++) {
                      acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight){
                          panel.style.maxHeight = null;
                        } else {
                          panel.style.maxHeight = panel.scrollHeight + "px";
                        } 
                      });
                    }
                    acc[0].click();
                }
                document.getElementById('regForm').addEventListener("submit", function(e){
                    e.preventDefault();
                    let urlSave = document.querySelector('#regForm').getAttribute('action');
                    let dataForm = new FormData( this );
                    let token = document.querySelector('input[name="_token"]').value;
                    
                    // fetch(urlSave,{
                    //     method: 'PUT',
                    //     body: JSON.stringify( jQuery('#regForm').serializeArray() ),
                    //     headers:{
                    //         'X-CSRF-TOKEN': token
                    //     }
                    // })
                    // .then( res => res.json() )
                    // .catch( error => console.error('Error:', error) )
                    // .then( response => {
                    //     console.log(response);
                    // });

                    let dataJson = JSON.stringify( jQuery('#regForm').serializeArray() );

                    jQuery.ajax({
                        url: urlSave,
                        type: 'PUT',
                        data: jQuery('#regForm').serializeArray(),
                        // processData: false,
                        // contentType: false,
                        // dataType: 'json',
                        headers:{
                            'X-CSRF-TOKEN': token
                        },
                        beforeSend: function(){
                            console.log('Before');
                        },
                        success: function(response){
                            console.log(response);
                            jQuery('.preview').html(response.oa_description);
                            jQuery('.preview').css('background', response.oa_back);
                            jQuery('#url_verify').attr('href', document.querySelector('#base-url').value + '/preview/' + response.oa_id);
                        }
                    });
                });
            });
        </script>
        
    @show
</body>
</html>
