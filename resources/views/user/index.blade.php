@extends('layouts.user')
@section('content')
    @if(auth()->check() && auth()->user()->id == $user->id)
        <a href="{{ route('page-settings.info') }}" class="bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 text-purple-700 py-2 h-16 flex items-center justify-center mb-5 cursor-pointer">
            {{ __('تنظیمات صفحه') }}
        </a>
    @endif
    <div class="w-full flex justify-center">
        <div class="p-5 w-full md:w-6/12 lg:5/12 xl:w-3/12 text-center relative">
            @include('user.partials.top')
            <h2 class="text-black dark:text-gray-300 text-2xl mb-2 capitalize @if($isEn) font-sans @endif">
                {{ $user->display_name }}
            </h2>
            @if($user->display_bio)
                <p class="whitespace-pre-wrap @if($isEn) font-sans @endif">{{ $user->display_bio }}</p>
            @endif
            @if($user->donation['active'])
                <div class="mt-8">
                    @if($isEn)
                        <a href="{{ route('user.donate', ['username' => $user->username, 'l' => 'en']) }}" class="mb-3 bg-gray-100 dark:bg-gray-800 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-lg text-black dark:text-gray-300 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer ltr font-sans">
                            <img class="mr-2" src="{{ asset('static/images/gift.svg') }}" alt="{{ __('Donate') }}" width="20"> {{ __('Donate') }}
                        </a>
                    @else
                        <a href="{{ route('user.donate', ['username' => $user->username]) }}" class="mb-3 bg-gray-100 dark:bg-gray-800 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-lg text-black dark:text-gray-300 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                            <img class="ml-2" src="{{ asset('static/images/gift.svg') }}" alt="{{ __('حمایت مالی') }}" width="20"> {{ __('حمایت مالی') }}
                        </a>
                    @endif
                </div>
            @endif
            @if(count($links))
                <div class="mt-8">
                    @foreach($links as $link)
                        <div class="mb-3">
                            @switch($link->type)
                                @case('text')
                                <a href="{{ route('go', ['link' => $link->token]) }}" rel="noreferrer" target="_blank" class="bg-gray-100 dark:bg-gray-800 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-lg text-black dark:text-gray-300 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer @if($isEn) font-sans ltr @endif">
                                    <img class="@if($isEn) mr-2 @else ml-2 @endif" src="{{ asset('static/favicon/android-chrome-192x192.png') }}" alt="{{ $link->display_title }}" width="20"> {{ $link->display_title }}
                                </a>
                                @break
                                @case('youtube')
                                <iframe width="100%" height="200" src="{{ $link->youtube_embed_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @break
                                @case('soundcloud')
                                <iframe width="100%" height="200" scrolling="no" frameborder="no" allow="autoplay" src="{{ $link->soundcloud_embed_link }}"></iframe>
                                @break
                                @case('spotify')
                                <iframe src="{{ $link->spotify_embed_link }}" width="100%" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                                @break
                                @case('aparat')
                                <iframe src="{{ $link->aparat_embed_link }}" width="100%" height="200" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                                @break
                            @endswitch
                        </div>
                    @endforeach
                </div>
            @endif
            @if(count($contactLinks))
                <div class="mt-8">
                    @foreach($contactLinks as $link)
                        <a href="{{ route('go', ['link' => $link->token]) }}" rel="noreferrer" target="_blank" class="mb-3 bg-gray-100 dark:bg-gray-800 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-lg text-black dark:text-gray-300 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer capitalize @if($isEn) font-sans ltr @endif">
                            <img class="@if($isEn) mr-2 @else ml-2 @endif" src="{{ asset('images/' . $link->title . '.svg') }}" alt="{{ $link->display_title }}" width="20"> {{ $link->display_title }}
                        </a>
                    @endforeach
                </div>
            @endif
            @if(count($socialLinks))
                <div class="mt-8 flex items-center justify-center">
                    @foreach($socialLinks as $key => $link)
                        <a href="{{ route('go', ['link' => $link->token]) }}" rel="noreferrer" target="_blank" class="cursor-pointer @if($key != count($socialLinks) - 1) ml-3 @endif transition duration-200 ease-in-out transform hover:scale-125">
                            <img src="{{ asset('images/' . $link->title . '.svg') }}" alt="{{ $link->title }}" width="20">
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
