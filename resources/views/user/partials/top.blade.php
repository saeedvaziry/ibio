@if($isEn)
    <a href="?l=fa" class="absolute left-0 top-0 flex items-center m-5 text-sm">
        <span class="ml-2 mt-1">{{ __('فارسی') }}</span>
        <img src="{{ asset('static/images/country-flags/ir.svg') }}" class="w-5 h-5" alt="FA">
    </a>
@else
    <a href="?l=en" class="absolute left-0 top-0 flex items-center m-5 text-sm">
        <span class="ml-2 mt-1">{{ __('English') }}</span>
        <img src="{{ asset('static/images/country-flags/en.svg') }}" class="w-5 h-5" alt="EN">
    </a>
@endif
<div class="mb-3">
    @if($user->avatar_url)
        <img class="rounded-full border-4 border-purple-100 w-20 h-20 mx-auto" src="{{ $user->avatar_url }}" alt="{{ $user->display_name }}" />
    @else
        <div class="rounded-full inline-flex items-center justify-center bg-purple-200 text-purple-700 border-4 border-purple-100 capitalize w-20 h-20 text-2xl">
            {{ mb_substr($user->display_name, 0, 1) }}
        </div>
    @endif
</div>
