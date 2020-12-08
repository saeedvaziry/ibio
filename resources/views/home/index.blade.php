@extends('layouts.home')

@section('page-title'){{ __('ibio.link') }}@endsection

@section('content')
    <section id="header" class="container px-5 py-10 mx-auto w-full md:w-8/12 text-center">
        <h1 class="text-5xl font-bold mb-10">
            You need only one
            <span class="text-purple-600">link</span>
        </h1>
        <h2 class="text-2xl text-gray-700 mb-3">A beautiful, simple, and free bio link</h2>
        <h2 class="text-2xl text-gray-700 mb-7">with social media embed for Youtube, Spotify and Soundcloud</h2>
        <p class="text-2xl text-gray-700 mb-12">
            Get your link now.
            <span class="font-extrabold">It's FREE! 🎉</span>
        </p>
        <form action="{{ route('register') }}" class="flex justify-center mb-10">
            <div class="relative flex items-center mr-2">
                <span class="text-xl absolute ml-2 md:ml-4 text-gray-400 font-extrabold">ibio.link/</span>
                <input type="text" required name="username" placeholder="yourname" class="bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:bg-white placeholder-gray-800 rounded-lg py-4 pr-2 md:mr-4 block w-full text-xl" style="padding-left: 5.6rem" autocomplete="off">
            </div>
            <button type="submit" class="bg-purple-600 hover:bg-purple-400 transition-colors focus:outline-none text-md xl:text-xl font-extrabold text-white py-3 px-3 xl:px-6 rounded-lg" style="min-width: 130px;">Create my link</button>
        </form>
        <div class="flex flex-col md:flex-row items-center justify-center mx-auto">
            <img src="{{ asset('static/images/sample-mobile.png') }}" alt="ibio.link" class="mb-3 md:mb-0 mr-0 md:mr-4 rounded-lg border-2 border-gray-100 w-full" style="max-width: 300px">
            <img src="{{ asset('static/images/sample-mobile-2.png') }}" alt="ibio.link" class="rounded-lg border-2 border-gray-100 w-full" style="max-width: 300px">
        </div>
    </section>
    <h2 class="text-center text-2xl my-10">Powerful features are here</h2>
    <section id="feature-dashboard" class="bg-gray-50 px-5 py-10 mx-auto w-full text-center">
        <div class="container mx-auto">
            <div class="w-full md:w-8/12 mx-auto flex flex-col md:flex-row items-center">
                <div class="w-full sm:w-1/2 text-left mb-5 md:mb-0">
                    <h2 class="text-4xl mb-6">Beautiful dashboard</h2>
                    <p class="mb-5 text-lg">This dashboard shows you everything that you need to see.</p>
                    <ul class="text-lg list-disc pl-5">
                        <li class="mb-3">Quick access to your page info</li>
                        <li class="mb-3">A brief info about your visits and clicks</li>
                        <li class="mb-3">Recent visits by their country and device type</li>
                    </ul>
                </div>
                <div class="w-full sm:w-1/2">
                    <img src="{{ asset('static/images/dashboard.png') }}" alt="Dashboard" class=" rounded-lg border-2 border-gray-100 w-full">
                </div>
            </div>
        </div>
    </section>
    <section id="feature-social-media" class="bg-white px-5 py-10 mx-auto w-full text-center">
        <div class="container mx-auto">
            <div class="w-full md:w-8/12 mx-auto flex flex-col flex-col-reverse md:flex-row items-center">
                <div class="w-full sm:w-1/2 mr-0 md:mr-8">
                    <img src="{{ asset('static/images/social.png') }}" alt="Social media" class="w-full">
                </div>
                <div class="w-full sm:w-1/2 text-left mb-5 md:mb-0">
                    <h2 class="text-4xl mb-6">Social media</h2>
                    <p class="mb-5 text-lg">Connect your social media accounts to ibio.link</p>
                    <p class="mb-5 text-lg">You can connect your social media links and track them with our robust stat tools</p>
                </div>
            </div>
        </div>
    </section>
    <section id="feature-stats" class="bg-gray-50 px-5 py-10 mx-auto w-full text-center">
        <div class="container mx-auto">
            <div class="w-full md:w-8/12 mx-auto flex flex-col md:flex-row items-center">
                <div class="w-full sm:w-1/2 text-left mb-5 md:mb-0">
                    <h2 class="text-4xl mb-6">Statistics</h2>
                    <p class="mb-5 text-lg">See what platform your audience uses the most</p>
                    <p class="mb-5 text-lg">We're detecting your visitors devices</p>
                </div>
                <div class="w-full sm:w-1/2">
                    <img src="{{ asset('static/images/stats.png') }}" alt="Dashboard" class=" rounded-lg border-2 border-gray-100 w-full">
                </div>
            </div>
        </div>
    </section>
@endsection
