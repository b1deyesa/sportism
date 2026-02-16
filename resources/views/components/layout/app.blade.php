<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/sportism-logo-round.png') }}" type="image/x-icon"> 
    
    {{-- Style --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-4.0.0.slim.min.js" integrity="sha256-8DGpv13HIm+5iDNWw1XqxgFB4mj+yOKFNb+tHBZOowc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4419d23bf4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body @if($class) class="{{ $class }}" @endif>
    
    {{-- Slot --}}
    {{ $slot }}
    
    @livewireScripts
</body>
</html>