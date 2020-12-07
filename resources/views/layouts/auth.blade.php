<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="A beautiful, simple, and free bio link with great features">
    <meta property="og:image" content="{{ asset('static/favicon/android-chrome-192x192.png') }}">
    @include('extensions.favicon')
</head>
<body class="text-black py-10 md:py-20 px-10 flex justify-center">
    <div class="w-full md:w-1/2 lg:w-2/3 xl:w-3/4">
        @yield('content')
    </div>
    @include('extensions.cookie')
    @include('extensions.google')
</body>
</html>
