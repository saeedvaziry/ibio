<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Get one link for all of your links">
    <meta name="keywords" content="With iBio you can simply put all of your links into one and share it on your social media">
    <title>@yield('page-title')</title>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="With iBio you can simply put all of your links into one and share it on your social media">
    <meta property="og:image" content="{{ asset('static/favicon/android-chrome-192x192.png') }}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
</head>
<body class="h-full">
    @inertia
    @routes
    @include('extensions.google')
    @include('extensions.cookie')
</body>
</html>
