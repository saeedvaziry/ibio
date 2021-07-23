<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="A beautiful, simple, and free bio link with social media embed for Youtube, Spotify and Soundcloud">
    <meta name="keywords" content="bio link,bio,instagram link,youtube link,free bio link,free link,social media link">
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
<body>
    @include('alerts.alert')
    <div class="text-black py-10 md:py-20 px-10 flex justify-center">
        <div class="w-full md:w-1/2 lg:w-2/3 xl:w-3/4">
            @yield('content')
        </div>
        @include('extensions.cookie')
        @include('extensions.google')
    </div>
</body>
</html>
