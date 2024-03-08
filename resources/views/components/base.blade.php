<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- Font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Forum&family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
                
        @yield('titles')

        @vite(['resources/css/app.css'])

    </head>

    <body>
        
        @yield('content')

        @vite(['resources/js/app.js'])

    </body>

</html>