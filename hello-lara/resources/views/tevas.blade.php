<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description', 'Default description')">
    <meta name="keywords" content="@yield('keywords', 'default, keywords')">
    <meta name="author" content="@yield('author', 'Author')">
    <meta property="og:title" content="@yield('pavadinimas')">
    <meta property="og:description" content="@yield('description', 'Default description')">
    <meta property="og:type" content="website">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <title>@yield('pavadinimas')</title>
</head>
<body>

    {{-- @include('nav') --}}
    @include('errors')
    @include('success')
    @include('info')
    <main>
    @yield('turinys')
    </main>
</body>
</html>