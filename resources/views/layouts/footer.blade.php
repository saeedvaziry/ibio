<div class="w-full sm:w-8/12 text-right mb-5 md:mb-0">
    <ul class="md:flex text-sm text-gray-600 text-center md:text-right">
        <li class="ml-3">
            <a href="{{ route('home') }}">صفحه اصلی</a>
        </li>
        <li class="ml-3">
            <a href="{{ route('home.privacy') }}">حریم خصوصی</a>
        </li>
        <li class="ml-3">
            <a href="{{ route('home.terms') }}">قوانین و شرایط استفاده</a>
        </li>
    </ul>
</div>
<div class="w-full sm:w-4/12 flex items-center justify-center md:justify-end">
    <a href="http://t.me/ibiolink" target="_blank" class="cursor-pointer ml-3 transition duration-200 ease-in-out transform hover:scale-125">
        <img src="{{ asset('images/telegram.svg') }}" alt="Telegram" width="20">
    </a>
    <a href="https://www.instagram.com/ibio.link.official" target="_blank" class="cursor-pointer ml-3 transition duration-200 ease-in-out transform hover:scale-125">
        <img src="{{ asset('images/instagram.svg') }}" alt="Instagram" width="20">
    </a>
    <a href="https://twitter.com/ibio_link" target="_blank" class="cursor-pointer ml-3 transition duration-200 ease-in-out transform hover:scale-125">
        <img src="{{ asset('images/twitter.svg') }}" alt="Twitter" width="20">
    </a>
</div>
