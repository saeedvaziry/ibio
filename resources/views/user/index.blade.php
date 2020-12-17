@extends('layouts.user')
@section('content')
    @if(auth()->check() && auth()->user()->id == $user->id)
        <a href="{{ route('page-settings.info') }}" class="bg-purple-100 text-purple-700 py-2 h-16 flex items-center justify-center mb-5 cursor-pointer">
            {{ __('تنظیمات صفحه') }}
        </a>
    @endif
    <div class="w-full flex justify-center">
        <div class="p-5 w-full md:w-6/12 lg:5/12 xl:w-3/12 text-center">
            <div class="mb-3">
                @if($user->avatar_url)
                    <img class="rounded-full border-4 border-purple-100 w-20 h-20 mx-auto" src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
                @else
                    <div class="rounded-full inline-flex items-center justify-center bg-purple-200 text-purple-700 border-4 border-purple-100 capitalize w-20 h-20 text-2xl">
                        {{ mb_substr($user->name, 0, 1) }}
                    </div>
                @endif
            </div>
            <h2 class="text-black text-2xl mb-2">
                {{ $user->name }}
            </h2>
            @if($user->bio)
                <p class="whitespace-pre-wrap">{{ $user->bio }}</p>
            @endif
            @if($user->donation['active'])
                <div class="mt-8">
                    <a href="{{ route('user.donate', ['username' => $user->username]) }}" class="mb-3 bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors text-lg text-black py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                        <img class="ml-2" src="{{ asset('static/images/gift.svg') }}" alt="{{ __('حمایت مالی') }}" width="20"> {{ __('حمایت مالی') }}
                    </a>
                </div>
            @endif
            @if(count($links))
                <div class="mt-8">
                    @foreach($links as $link)
                        <div class="mb-3">
                            @switch($link->type)
                                @case('text')
                                <a href="{{ route('go', ['link' => $link->token]) }}" rel="noreferrer" target="_blank" class="bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors text-lg text-black py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                                    <img class="ml-2" src="{{ asset('static/favicon/android-chrome-192x192.png') }}" alt="{{ $link->title }}" width="20"> {{ $link->title }}
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
                        <a href="{{ route('go', ['link' => $link->token]) }}" rel="noreferrer" target="_blank" class="mb-3 bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors text-lg text-black py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                            <img class="ml-2" src="{{ asset('images/' . $link->title . '.svg') }}" alt="{{ $link->title }}" width="20"> {{ $link->display_title }}
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
