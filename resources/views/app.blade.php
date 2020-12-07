<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @include('extensions.favicon')
    <title>@yield('page-title')</title>
    <script>
        window.app = {
            csrf_token: '{{ csrf_token() }}'
        }
    </script>
    @routes
</head>
<body class="dark:bg-gray-900">
    @inertia
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @include('extensions.cookie')
</body>
</html>
