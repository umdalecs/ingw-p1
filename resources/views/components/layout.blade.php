<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <a href="/">
        <h1 class="font-bold text-3xl p-4">Personas</h1>
    </a>
    <main class="px-4">
        {{ $slot }}
    </main>
</body>

</html>

@vite(['resources/js/personas.js'])
