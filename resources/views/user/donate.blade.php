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
                {{ __('حمایت مالی از') }}
                <span class="text-purple-600">{{ $user->name }}</span>
            </h2>
            <form id="payment" class="text-right @if(!isset($errors) || count($errors) == 0) hidden @endif" method="post" action="{{ route('user.donate', ['username' => $user->username]) }}">
                @csrf
                <x-alert type="validation" class="mb-3"></x-alert>
                <x-input type="text" name="amount" label="" placeholder="{{ __('مبلغ (تومان)') }}" value="{{ old('amount') }}" class="mb-2"></x-input>
                <x-input type="text" name="name" label="" placeholder="{{ __('نام شما (اختیاری)') }}" value="{{ old('name') }}" class="mb-2"></x-input>
                <textarea name="message" rows="4" placeholder="{{ __('یه چیز خوب بنویسید (اختیاری)') }}" class="py-3 px-4 w-full bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:bg-white placeholder-gray-500 rounded-lg">{{ old('message') }}</textarea>
                <div class="mt-4">
                    <x-button type="purple" full>{{ __('پرداخت') }}</x-button>
                </div>
            </form>
            <div id="amounts" class="@if(isset($errors) && count($errors) > 0) hidden @endif">
                @foreach($user->donation['amounts'] as $amount)
                    <div class="mb-3">
                        <a href="javascript:" onclick="showPayment({{ $amount }})" class="bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors text-lg text-black py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                            {{ latin_number_to_persian(custom_money_format($amount)) }} {{ __('تومان') }}
                        </a>
                    </div>
                @endforeach
                <div class="mb-3">
                    <a href="javascript:" onclick="showPayment()" class="bg-purple-100 focus:outline-none hover:bg-purple-200 transition-colors text-lg text-purple-600 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                        {{ __('مبلغ دلخواه') }}
                    </a>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                @if($user->donation['show_supporters'])
                    <a href="{{ route('user.donate.supporters', ['username' => $user->username]) }}" class="text-center text-sm text-purple-700 mb-3">{{ __('لیست حامی ها') }}</a>
                @endif
                <a href="{{ route('user', ['username' => $user->username]) }}" class="text-center text-sm text-gray-600">{{ __('برگشت به صفحه') }} {{ $user->name }}</a>
            </div>
        </div>
    </div>
    <script>
        function showPayment(amount = '') {
            if (amount) {
                document.getElementById('amount').value = amount;
            }
            document.getElementById('amounts').classList.add('hidden');
            document.getElementById('payment').classList.remove('hidden');
        }
    </script>
@endsection
