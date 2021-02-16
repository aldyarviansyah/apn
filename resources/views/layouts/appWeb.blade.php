<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png?v=2') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png?v=2') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png?v=2') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png?v=2') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png?v=2') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png?v=2') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png?v=2">

    <title>PT. Agung Prima Nusantara - We make your arrival easy/</title>
    <meta name="keywords" content="PT. Agung Prima Nusantara - We make your arrival easy" />
    <meta name="description" content="PT. Agung Prima Nusantara - We make your arrival easy" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/cdn/bootstrap.min.css') }}">

    @yield('extraCss')
    @livewireStyles
</head>
<body>

@yield('content')

@include('layouts.includes.footer')

@yield('extraJs')
@livewireScripts
<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('element.updated', (el, component) => {
            feather.replace();
        });
    });
</script>
</body>
</html>
