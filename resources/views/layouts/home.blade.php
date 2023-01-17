<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Get one link for all of your links">
    <meta name="keywords" content="With iBio you can simply put all of your links into one and share it on your social media">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="With iBio you can simply put all of your links into one and share it on your social media">
    <meta property="og:image" content="{{ asset('static/favicon/android-chrome-192x192.png') }}">
    @include('extensions.favicon')
    @stack('styles')
</head>
<body class="bg-gray-100 overflow-x-hidden">
    <nav class="bg-white w-full h-16 shadow-sm rounded-b-3xl flex items-center justify-center">
        <div class="container flex items-center justify-between px-5">
            <a href="/"><img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="h-10"></a>
            <div class="flex items-center justify-end">
                <a href="{{ route('terms') }}">{{ __("Terms") }}</a>
                <a href="{{ route('policy') }}" class="ml-5">{{ __("Policy") }}</a>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-primary-600 to-secondary-600 font-normal font-medium text-white transition hover:from-primary-600 hover:to-primary-600 focus:outline-none disabled:opacity-25 px-4 py-2 text-md w-max ml-5">
                    {{ __("Login") }}
                </a>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="bg-primary-900 text-white py-5 flex items-center justify-center h-[70px]">
        <div class="container flex items-center justify-between px-5">
            <div class="flex items-center justify-start">
                <a href="{{ route('terms') }}">{{ __("Terms") }}</a>
                <a href="{{ route('policy') }}" class="ml-5">{{ __("Policy") }}</a>
            </div>
            <div class="flex items-center justify-end">
                <a href="https://github.com/saeedvaziry/ibio" target="_blank" class="transition duration-200 ease-in-out transform hover:scale-125">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white fill-current w-7 h-7" viewBox="0 0 512 512"><title>Logo Github</title><path d="M256 32C132.3 32 32 134.9 32 261.7c0 101.5 64.2 187.5 153.2 217.9a17.56 17.56 0 003.8.4c8.3 0 11.5-6.1 11.5-11.4 0-5.5-.2-19.9-.3-39.1a102.4 102.4 0 01-22.6 2.7c-43.1 0-52.9-33.5-52.9-33.5-10.2-26.5-24.9-33.6-24.9-33.6-19.5-13.7-.1-14.1 1.4-14.1h.1c22.5 2 34.3 23.8 34.3 23.8 11.2 19.6 26.2 25.1 39.6 25.1a63 63 0 0025.6-6c2-14.8 7.8-24.9 14.2-30.7-49.7-5.8-102-25.5-102-113.5 0-25.1 8.7-45.6 23-61.6-2.3-5.8-10-29.2 2.2-60.8a18.64 18.64 0 015-.5c8.1 0 26.4 3.1 56.6 24.1a208.21 208.21 0 01112.2 0c30.2-21 48.5-24.1 56.6-24.1a18.64 18.64 0 015 .5c12.2 31.6 4.5 55 2.2 60.8 14.3 16.1 23 36.6 23 61.6 0 88.2-52.4 107.6-102.3 113.3 8 7.1 15.2 21.1 15.2 42.5 0 30.7-.3 55.5-.3 63 0 5.4 3.1 11.5 11.4 11.5a19.35 19.35 0 004-.4C415.9 449.2 480 363.1 480 261.7 480 134.9 379.7 32 256 32z"/></svg>
                </a>
            </div>
        </div>
    </footer>
    @stack('scripts')
    @include('extensions.google')
    @include('extensions.cookie')
</body>
</html>
