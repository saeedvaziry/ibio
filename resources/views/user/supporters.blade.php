@extends('layouts.user')
@section('content')
    @if(auth()->check() && auth()->user()->id == $user->id)
        <a href="{{ route('donation.settings') }}" class="bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 text-purple-700 py-2 h-16 flex items-center justify-center mb-5 cursor-pointer">
            {{ __('تنظیمات حمایت مالی') }}
        </a>
    @endif
    <div class="w-full flex justify-center">
        <div class="p-5 w-full md:w-6/12 lg:5/12 xl:w-3/12 text-center relative">
            @include('user.partials.top')
            <h2 class="text-black dark:text-gray-300 text-2xl mb-8">
                @if($isEn)
                    <span class="text-purple-600 capitalize">{{ $user->display_name }}'s</span> {{ __('Supporters') }}
                @else
                    {{ __('لیست حامیان') }}
                    <span class="text-purple-600">{{ $user->display_name }}</span>
                @endif
            </h2>
            <div class="mb-5 border-2 rounded-lg p-3 md:p-6 border-gray-100 dark:border-purple-500 dark:border-opacity-10 text-gray-600 @if($isEn) ltr text-left @endif">
                @if(count($payments) > 0)
                    @foreach($payments as $key => $payment)
                        <div class="flex items-center justify-between @if($key < count($payments) - 1) mb-3 @endif">
                            <div>{{ $payment->sender }}</div>
                            <div>{{ $isEn ? custom_money_format($payment->amount) : latin_number_to_persian(custom_money_format($payment->amount)) }} {{ $payment->display_currency }}</div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center mb-3">هنوز هیچ حمایتی انجام نشده ☹️</div>
                    <a href="{{ route('user.donate', ['username' => $user->username]) }}" class="bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 focus:outline-none hover:bg-purple-200 transition-colors text-lg text-purple-600 py-2 px-6 rounded-lg flex items-center justify-center cursor-pointer">
                        {{ __('اولین نفر باش!') }}
                    </a>
                @endif
            </div>
            <div class="mt-8 flex flex-col">
                <a href="{{ route('user.donate', ['username' => $user->username]) }}" class="text-center text-sm text-purple-700 mb-3">
                    {{ $isEn ? __('Donate to') : __('حمایت مالی از') }}
                    <span class="font-bold">{{ $user->display_name }}</span>
                </a>
                <a href="{{ route('user', ['username' => $user->username]) }}" class="text-center text-sm text-gray-600">{{ $isEn ? __('Back to') : __('برگشت به صفحه') }} {{ $user->display_name }}</a>
            </div>
        </div>
    </div>
@endsection
