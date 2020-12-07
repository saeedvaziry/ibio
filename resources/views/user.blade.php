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
    <meta property="og:image" content="{{ $user->avatar_url }}">
</head>
<body class="min-h-screen flex flex-col justify-between">
    <div class="h-full">
        @if(auth()->check() && auth()->user()->id == $user->id)
            <a href="{{ route('page-settings.info') }}" class="bg-purple-100 text-purple-700 py-2 h-16 flex items-center justify-center mb-5 cursor-pointer">
                {{ __('Edit this page') }}
            </a>
        @endif
        <div class="w-full flex justify-center">
            <div class="p-5 w-full md:w-6/12 lg:5/12 xl:w-3/12 text-center">
                <div class="mb-3">
                    @if($user->avatar_url)
                        <img class="rounded-full border-4 border-purple-100 w-20 h-20 mx-auto" src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
                    @else
                        <div class="rounded-full inline-flex items-center font-semibold justify-center bg-purple-200 text-purple-700 border-4 border-purple-100 capitalize w-20 h-20 text-2xl">
                            {{ $user->name[0] }}{{  $user->name[1] }}
                        </div>
                    @endif
                </div>
                <h2 class="text-black text-2xl mb-2">
                    {{ $user->name }}
                </h2>
                @if($user->bio)
                    <p class="whitespace-pre-wrap">{{ $user->bio }}</p>
                @endif
                @if(count($links))
                    <div class="mt-8">
                        @foreach($links as $link)
                            <a href="{{ route('go', ['link' => $link->token]) }}" rel="noreferrer" target="_blank" class="mb-3 bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors text-lg font-bold text-black py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">{{ $link->title }}</a>
                        @endforeach
                    </div>
                @endif
                @if(count($contactLinks))
                    <div class="mt-8">
                        @foreach($contactLinks as $link)
                            <a href="{{ route('go', ['link' => $link->token]) }}" rel="noreferrer" target="_blank" class="mb-3 bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors text-lg font-bold text-black py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                                <img class="mr-2" src="{{ asset('images/' . $link->title . '.svg') }}" alt="{{ $link->title }}" width="20"> {{ $link->url }}
                            </a>
                        @endforeach
                    </div>
                @endif
                @if(count($socialLinks))
                    <div class="mt-8 flex items-center justify-center">
                        @foreach($socialLinks as $link)
                            <a href="{{ route('go', ['link' => $link->token]) }}" rel="noreferrer" target="_blank" class="cursor-pointer mr-3">
                                <img src="{{ asset('images/' . $link->title . '.svg') }}" alt="{{ $link->title }}" width="20">
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <a href="/" class="inline-flex text-lg text-gray-400 mt-10 hover:text-black mx-auto mb-6">
        <img src="{{ asset('static/images/logo.png') }}" alt="ibio.link" class="h-6">
    </a>
</body>
</html>
