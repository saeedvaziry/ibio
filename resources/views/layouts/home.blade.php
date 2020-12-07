<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="A beautiful, simple, and free bio link with great features">
    <meta property="og:image" content="{{ asset('static/favicon/android-chrome-192x192.png') }}">
    @include('extensions.favicon')
</head>
<body class="overflow-x-hidden">
    @include('layouts.home.navbar')
    @yield('content')
    <section id="footer" class="bg-white px-5 py-10 mx-auto w-full text-gray-600">
        <div class="container mx-auto">
            <div class="w-full md:w-8/12 mx-auto flex flex-col md:flex-row items-center">
                <div class="w-full sm:w-4/12 text-left mb-5 md:mb-0">Copyright © ibio.link</div>
                <div class="w-full sm:w-8/12 md:flex items-center justify-end">
                    <ul class="md:flex">
                        <li class="mr-3">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="mr-3">
                            <a href="{{ route('home.privacy') }}">Privacy policy</a>
                        </li>
                        <li class="mr-3">
                            <a href="{{ route('home.terms') }}">Terms of service</a>
                        </li>
                        <li>
                            <a href="{{ route('home.cookie') }}">Cookie policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @include('extensions.cookie')
    @include('extensions.google')
</body>
</html>
