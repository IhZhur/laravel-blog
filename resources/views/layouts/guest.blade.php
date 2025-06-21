<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased">
    <div class="app-wrapper flex flex-col items-center justify-center min-h-screen px-4">
        <!-- Логотип -->
        <div class="mb-6">
            <a href="/">
                <x-application-logo class="logo" />
            </a>
        </div>

        <!-- Контент (login, register и т.д.) -->
        <div class="w-full max-w-md card">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
