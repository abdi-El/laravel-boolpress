<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        {{-- link a css negli assets --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> 

    </head>
    <body>
        <header>
            <nav class="navbar justify-content-end">
                @if (Route::has('login'))
                
                    @auth
                        <div class="nav-item ">
                            <a href="{{ route('admin.home') }}" class="nav-link btn btn-warning">Modifica Contenuto</a>
                        </div>
                    @else
                        <div class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link btn btn-success mx-2">Accedi</a>
                        </div>
                        @if (Route::has('register'))
                            <div class="nav-item ">
                                <a href="{{ route('register') }}" class="nav-link btn btn-primary">Registrati</a>
                            </div>
                        @endif
                    @endauth
                
            @endif
            </nav>
        </header>
        <div id="root"></div>
        {{-- connessione a js per il from office usando asset() che connette direttamente alla cartella resources --}}
        <script src="{{asset('js/front.js')}}"></script>
    </body>
</html>
