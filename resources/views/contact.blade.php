<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
        <link rel="stylesheet" href="{{asset('css/style.css')}}" >
   
    </head>
    <body class="antialiased">
        <section class="container-fluid">
            <div class="row justify-content-md-center mt-3">
                <div class="col-md-6 m-auto">
                    <img class="img-fluid" src="{{asset('img/contact.png')}}">
                </div>
                <div class="col-md-6">
                    @if(session('status') == '1')
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @elseif(session('status') == '0')
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <x-formcomponent  />
                </div>
                
            </div>
            
        </section>
    </body>
</html>
