<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>{{ $title }}</title>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/' . $user->username) }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $user->bio }}">
    <meta property="og:image" content="{{ $user->avatar ? $user->avatar_url : asset('static/favicon/android-chrome-192x192.png') }}">
    <style>
        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
        }

        html {
            height: -webkit-fill-available;
        }
    </style>
    @include('extensions.favicon')
</head>
<body class="flex flex-col justify-between">
    <div style="min-height: calc(100% - 24px)">
        @yield('content')
    </div>
    <a href="/" class="inline-flex text-lg text-gray-400 hover:text-black mx-auto mt-5 mb-5">
        <img src="{{ asset('static/images/logo.png') }}" alt="ibio.link" class="h-6">
    </a>
    @include('extensions.google')
</body>
</html>
