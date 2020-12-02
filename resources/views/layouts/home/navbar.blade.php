<nav class="h-16 top-0 flex items-center">
    <div class="container flex justify-between px-3 md:px-0">
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="mr-3">
                <img src="{{ mix('images/logo.png') }}" class="h-10">
            </a>
        </div>
        <div class="flex items-center">
            <ul class="flex mr-2">
                <li class="mx-3">
                    <a href="#pricing" class="text-lg text-gray-700 hover:text-primary-500">{{ __('Pricing') }}</a>
                </li>
            </ul>
            <a href="{{ route('login') }}" class="shadow bg-primary-500 hover:bg-primary-700 focus:outline-none text-white py-2 px-4 rounded transition-all font-light capitalize">sign in</a>
        </div>
    </div>
</nav>
