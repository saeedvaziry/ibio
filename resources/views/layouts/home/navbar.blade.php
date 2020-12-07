<nav class="flex items-center justify-center">
    <div class="container flex justify-between items-center px-5 py-7 md:px-0">
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="mr-3">
                <img src="{{ asset('static/images/logo.png') }}" class="h-7 md:h-10" alt="{{ config('app.name') }}">
            </a>
        </div>
        <div class="flex items-center">
            <a href="{{ route('login') }}" class="bg-white border-2 border-black focus:outline-none hover:bg-black hover:text-white transition-colors font-bold text-black py-2 px-3 md:px-6 rounded-lg md:flex items-center justify-center text-md md:text-xl">{{ __('Log In') }}</a>
            <a href="{{ route('register') }}" class="ml-3 border-2 border-black bg-black focus:outline-none font-bold text-white py-2 px-3 md:px-6 rounded-lg md:flex items-center justify-center text-md md:text-xl">{{ __('Sign Up') }}</a>
        </div>
    </div>
</nav>
