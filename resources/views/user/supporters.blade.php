@extends('layouts.user')
@section('content')
    @if(auth()->check() && auth()->user()->id == $user->id)
        <a href="{{ route('donation.settings') }}" class="bg-purple-100 text-purple-700 py-2 h-16 flex items-center justify-center mb-5 cursor-pointer">
            {{ __('تنظیمات حمایت مالی') }}
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
            <h2 class="text-black text-2xl mb-8">
                {{ __('لیست حامیان') }}
                <span class="text-purple-600">{{ $user->name }}</span>
            </h2>
            <div class="mb-5 border-2 rounded-lg p-3 md:p-6 border-gray-100 text-gray-600">
                @foreach($payments as $key => $payment)
                    <div class="flex items-center justify-between @if($key < count($payments) - 1) mb-3 @endif">
                        <div>{{ $payment->sender }}</div>
                        <div>{{ latin_number_to_persian(custom_money_format($payment->amount)) }} تومان</div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 flex flex-col">
                <a href="{{ route('user', ['username' => $user->username]) }}" class="text-center text-sm text-purple-700 mb-3">
                    {{ __('حمایت مالی از') }}
                    <span class="font-bold">{{ $user->name }}</span>
                </a>
                <a href="{{ route('user', ['username' => $user->username]) }}" class="text-center text-sm text-gray-600">{{ __('برگشت به صفحه') }} {{ $user->name }}</a>
            </div>
        </div>
    </div>
@endsection
