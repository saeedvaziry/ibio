<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="با لینک شخصیت پول هم دریافت کن">
    <meta name="keywords" content="لینک بیو,لینک حمایت مالی,لینک شخصی,بیو لینک اینستاگرام,دونیت,donate">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="با لینک شخصیت پول هم دریافت کن">
    <meta property="og:image" content="{{ asset('static/favicon/android-chrome-192x192.png') }}">
    @include('extensions.favicon')
</head>
<body class="overflow-x-hidden">
    @include('alerts.alert')
    @include('layouts.home.navbar')
    @yield('content')
    <section id="footer" class="bg-white px-5 py-10 mx-auto w-full text-gray-600">
        <div class="container mx-auto">
            <div class="w-full md:w-8/12 mx-auto flex flex-col md:flex-row items-center">
                @include('layouts.footer')
            </div>
        </div>
    </section>
    @include('extensions.cookie')
    @include('extensions.google')
    @include('extensions.support')
</body>
</html>
