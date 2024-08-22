<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/3ebb71c4fc.js" crossorigin="anonymous"></script>
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body id="app">
        <livewire:lang-switcher />

        <div class="wrapper wrapper--large">
            {{ $slot }}
        </div>
    </body>
</html>
