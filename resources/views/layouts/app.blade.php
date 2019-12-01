<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Macrea</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

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
                    Macrea
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

        <main class="section_core">
            @yield('content')
        </main>
        <footer class="d-flex justify-content-center pt-3 pb-3" style="margin-top: 50px; background: #ccc; width: 100%;">
            <img style="width: 200px;" src="{{ asset('img/logo-unal.png') }}" alt="">
        </footer>
    </div>
    @section('script')
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/intro.min.js') }}"></script>
        <script src="{{ asset('js/Sortable.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/tinymce.min.js') }}"></script>
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
                document.getElementById("nextBtn").innerHTML = "Finalizar";
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
                    // document.getElementById("regForm").submit();
                    window.location.href = $('#redirect').val();
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
                    let urlMethod = document.querySelector('#regForm').getAttribute('method');
                    let dataForm = new FormData( this );
                    let token = document.querySelector('input[name="_token"]').value;

                    $('#oa_description').attr( 'value', $('#cont-text-save').html() );
                    
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
                        type: urlMethod,
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
                            jQuery('.preview').html(response.oa_description);
                            jQuery('.preview .edit-text').attr('contenteditable', 'false');
                            jQuery('.preview .btns-options').remove();
                            jQuery('.preview').css('background', response.oa_back);
                            jQuery('#url_verify').attr('href', document.querySelector('#base-url').value + '/preview/' + response.oa_id);
                        }
                    });
                });
            });
        </script>
        {{-- SORTABLE --}}
        <script type="text/javascript">
            var el = document.getElementById('text-save');
            var options = document.getElementById('options');
            var selectedText = null;

            new Sortable.create(options, {
                group: {
                    name: 'shared',
                    pull: 'clone',
                    put: false // Do not allow items to be put into this list
                },
                onClone: function (evt) {
                    var origEl = evt.item;
                    var cloneEl = evt.clone;

                    // if( !origEl.hasClass('image') ){
                        let dataPlaceholder = origEl.children[1].getAttribute("data-placeholder")
                        let dataClass = origEl.children[1].getAttribute("data-class")

                        for (let i = origEl.children[1].attributes.length - 1; i >= 0; i--) {
                            origEl.children[1].removeAttribute(origEl.children[1].attributes[i].name)
                        }

                        origEl.children[1].innerHTML = ''
                        origEl.children[1].setAttribute('placeholder', dataPlaceholder)
                        origEl.children[1].setAttribute('class', dataClass)

                        origEl.children[1].setAttribute('contenteditable', 'true')

                        origEl.children[1].addEventListener('click', function(elem){
                            selectedText = origEl.children[1]
                        }, false)
                    // }
                },
                animation: 150,
                sort: false, // To disable sorting: set sort to false
            });

            new Sortable.create(el, {
                group: 'shared',
                animation: 150
            });

            window.addEventListener('load', function(){
                const deleteBtn = document.querySelectorAll(".icon-delete");
                const insertImg = document.querySelector("#insert-img");
                const textEdit = document.querySelectorAll(".edit-text");

                deleteBtn.forEach(function(element){
                    element.addEventListener('click', function(e){
                        e.preventDefault()
                        alert('Delete')
                        e.target.parentElement.parentElement.remove()
                    })
                })

                function encodeImagetoBase64(element, inputAlt) {
                    var file = element;
                    var reader = new FileReader();

                    reader.onloadend = function() {
                        const txtSave = document.querySelector('#text-save');
                        let conItem = document.createElement('div');
                        let conOpt = document.createElement('div');
                        let conSpanEdit = document.createElement('span');
                        let conSpanMove = document.createElement('span');
                        let conSpanDelete = document.createElement('span');
                        let conImg = document.createElement('img');

                        conItem.setAttribute('class', 'item-move');
                        conItem.setAttribute('draggable', 'false');
                        conOpt.setAttribute('class', 'btns-options');
                        conSpanEdit.setAttribute('class', 'fa fa-edit icon-edit');
                        conSpanMove.setAttribute('class', 'fa fa-arrows-alt icon-move');
                        conSpanDelete.setAttribute('class', 'fa fa-times icon-delete');

                        conImg.setAttribute('src', reader.result);
                        conImg.setAttribute('alt', inputAlt.value );


                        // conOpt.appendChild(conSpanEdit);
                        conOpt.appendChild(conSpanMove);
                        conOpt.appendChild(conSpanDelete);
                        conItem.appendChild(conOpt);
                        conItem.appendChild(conImg);
                        txtSave.appendChild(conItem);
                    }
                    reader.readAsDataURL(file);
                }

                insertImg.addEventListener('click', function(e){
                    e.preventDefault();

                    const inputAlt = document.querySelector('#txt-alt');
                    const inputImg = document.querySelector('#input-img');

                    if( inputImg.files.length == 0 ){
                        alert('No cargaste una imagen');
                    }else{
                        if(inputImg.files[0].size <= 102400){
                            if( inputAlt.value == null || inputAlt.value.length == 0 || /^\s*$/.test(inputAlt.value) ){
                                alert('El texto alternativo no puede estar vacío');
                            }else{
                                encodeImagetoBase64(inputImg.files[0], inputAlt);
                                $('#modalImg').modal('hide');
                                inputAlt.value = "";
                                inputImg.value = "";
                            }
                        }else{
                            alert("Archivo demasiado grande!");
                            this.value = "";
                        }
                    }
                });
            }, false)

            // op-text click
            let opText = document.getElementsByClassName('op-text')
            for(let i = 0; i < opText.length; i++){         
                opText[i].addEventListener('click', function(e){

                    e.preventDefault()

                    selectedText.focus()

                    let wSelected = opText[i].getAttribute('data-w')
                    let opSelected = opText[i].getAttribute('data-option')

                    if(wSelected == 'align'){

                        selectedText.style.textAlign = opSelected

                    }else if(wSelected == 'weight'){

                        document.execCommand(opSelected)

                    }
                }, false)
            }

            // Background Change

            let selectBack = document.getElementById('contraste');

            for (let i = selectBack.options.length - 1; i >= 0; i--) {
                selectBack.options[i].style.backgroundColor = selectBack.options[i].getAttribute('data-bg')
                selectBack.options[i].style.color = selectBack.options[i].getAttribute('data-color')
            }

            selectBack.addEventListener('change', () => {

                let indexSelected = selectBack.selectedIndex
                let optionTag = selectBack.options

                let dataBgOption = optionTag[indexSelected].getAttribute('data-bg')
                let dataCoOption = optionTag[indexSelected].getAttribute('data-color')

                $('#oa_back').attr( 'value', selectBack.value );

                selectBack.style.backgroundColor = dataBgOption
                selectBack.style.color = dataCoOption

                let elementBack = document.getElementById('text-save')
                elementBack.style.backgroundColor = dataBgOption
                elementBack.style.color = dataCoOption

            }, false)

            let selectFont = document.getElementById('oa_font');

            selectFont.addEventListener('change', () => {
                let elementBack = document.getElementById('text-save');
                elementBack.style.fontFamily = selectFont.value;
            });

            var elementToEdit = null;

            $('.icon-edit').click( function(e){
                elementToEdit = $(this).parent().siblings();
            });

            let selectPt = document.getElementById('pt');
            let selectAlign = document.getElementById('align');

            let acceptChanges = document.getElementById('accept-change');

            acceptChanges.addEventListener('click', () => {
                elementToEdit.css('text-align', selectAlign.value);
                elementToEdit.css('font-size', selectPt.value);
                $('#modalEach').modal('hide');
            });

            document.getElementById('text-save').addEventListener('paste', (e) => {
                e.preventDefault();

                let clipboardData = e.clipboardData || window.clipboardData
                let pastedData = clipboardData.getData('text/plain')

                document.execCommand('insertHTML', false, pastedData)

                console.log(pastedData)
            }, false)
        </script>
        
    @show
</body>
</html>
