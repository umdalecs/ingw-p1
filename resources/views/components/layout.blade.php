<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body  class="p-4">
    <header class="flex justify-between gap-4 items-center font-bold text-3xl">
        <a href="/">
            <h1 class="font-bold text-3xl">Personas</h1>
        </a>
        <section>
            {{ $rightSide ?? '' }}
        </section>
    </header>

    <main>
        {{ $slot }}
    </main>
    @vite(['resources/js/personas.js'])
</body>

</html>

