<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-between items-center px-6 pt-4 font-bold text-3xl">
        <a href="/">
            <h1 class="font-bold text-3xl">Personas</h1>
        </a>

        @if (Request::is('/'))
            <a href="/new" class="btn btn-primary">
                Agregar
            </a>
        @endif
    </div>
    {{ $slot }}
</body>

</html>
