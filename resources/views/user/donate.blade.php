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
            <h2 class="text-black dark:text-gray-300 text-2xl mb-8 @if($isEn) ltr font-sans @endif">
                @if($isEn)
                    {{ __('Donate to') }}
                @else
                    {{ __('حمایت مالی از') }}
                @endif
                <span class="text-purple-600 capitalize">{{ $user->display_name }}</span>
            </h2>
            <div id="currency-box" class="@if(!$user->donation['payir_api'] || !$user->donation['jeeb_api']) hidden @endif @if($errors->irr->count() || $errors->crypto->count()) hidden @endif">
                @if($user->donation['payir_api'])
                    <a href="javascript:" onclick="showIRRPayment()" class="bg-gray-100 dark:bg-gray-800 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-lg text-black dark:text-gray-300 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer mb-3 @if($isEn) ltr font-sans @endif">
                        <img src="{{ asset('static/images/shaparak.svg') }}" alt="Iranian Rial" class="h-6 {{ $isEn ? 'mr-2' : 'ml-2' }}"> {{ $isEn ? __('Iranian Rial') : __('پرداخت ریالی') }}
                    </a>
                @endif
                @if($user->donation['jeeb_api'])
                    <a href="javascript:" onclick="showCryptoPayment()" class="bg-gray-100 dark:bg-gray-800 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-lg text-black dark:text-gray-300 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer @if($isEn) ltr font-sans @endif">
                        <img src="{{ asset('static/images/bitcoin.svg') }}" alt="Iranian Rial" class="h-6 {{ $isEn ? 'mr-2' : 'ml-2' }}"> {{ $isEn ? __('Crypto Currency') : __('پرداخت با کریپتو') }}
                    </a>
                @endif
            </div>
            @if($user->donation['payir_api'])
                <div id="irr-payment-box" class="@if($user->donation['payir_api'] && $user->donation['jeeb_api'] && !$errors->irr->count()) hidden @endif">
                    <form id="irr-payment" class="text-right @if(!$errors->irr->count()) hidden @endif @if($isEn) ltr font-sans @endif" method="post" action="{{ route('user.donate', ['username' => $user->username]) }}">
                        @csrf
                        @if($isEn)
                            <x-alert type="validation" class="mb-3 text-left ltr font-sans" error-bag="irr"></x-alert>
                        @else
                            <x-alert type="validation" class="mb-3" error-bag="irr"></x-alert>
                        @endif
                        <input type="hidden" name="type" value="irr">
                        <x-input type="text" name="irr_amount" label="" placeholder="{{ $isEn ? __('Amount (IRT)') : __('مبلغ (تومان)') }}" value="{{ old('irr_amount') }}" class="mb-2" required></x-input>
                        <x-input type="text" name="irr_name" label="" placeholder="{{ $isEn ? __('Your name (optional)') : __('نام شما (اختیاری)') }}" value="{{ old('irr_name') }}" class="mb-2"></x-input>
                        <textarea name="irr_message" rows="4" placeholder="{{ $isEn ? __('Say something good (optional)') : __('یه چیز خوب بنویسید (اختیاری)') }}" class="py-3 px-4 w-full bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-gray-500 focus:bg-white dark:focus:bg-gray-700 placeholder-gray-500 rounded-lg">{{ old('irr_message') }}</textarea>
                        <div class="mt-4">
                            <x-button type="purple" full>{{ $isEn ? __('Pay') : __('پرداخت') }}</x-button>
                        </div>
                    </form>
                    <div id="irr-amounts" class="@if($errors->irr->count()) hidden @endif">
                        @foreach($user->donation['amounts'] as $amount)
                            <div class="mb-3 @if($isEn) ltr font-sans @endif">
                                <a href="javascript:" onclick="showIRRPaymentAmount({{ $amount }})" class="bg-gray-100 dark:bg-gray-800 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-lg text-black dark:text-gray-300 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                                    {{ $isEn ? custom_money_format($amount) : latin_number_to_persian(custom_money_format($amount)) }} {{ $isEn ? __('IRT') : __('تومان') }}
                                </a>
                            </div>
                        @endforeach
                        <div class="mb-3">
                            <a href="javascript:" onclick="showIRRPaymentAmount()" class="bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 focus:outline-none hover:bg-purple-200 transition-colors text-lg text-purple-600 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                                {{ $isEn ? __('Custom Amount') : __('مبلغ دلخواه') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            @if($user->donation['jeeb_api'])
                <div id="crypto-payment-box" class="@if($user->donation['payir_api'] && $user->donation['jeeb_api'] && !$errors->crypto->count()) hidden @endif">
                    <form id="crypto-payment" class="text-right @if(!$errors->crypto->count()) hidden @endif @if($isEn) ltr font-sans @endif" method="post" action="{{ route('user.donate', ['username' => $user->username]) }}">
                        @csrf
                        @if($isEn)
                            <x-alert type="validation" class="mb-3 text-left ltr font-sans" error-bag="crypto"></x-alert>
                        @else
                            <x-alert type="validation" class="mb-3" error-bag="crypto"></x-alert>
                        @endif
                        <input type="hidden" name="type" value="crypto">
                        <x-input type="text" name="crypto_amount" label="" placeholder="{{ $isEn ? __('Amount (USD)') : __('مبلغ (دلار)') }}" value="{{ old('crypto_amount') }}" class="mb-2" required></x-input>
                        <x-input type="text" name="crypto_name" label="" placeholder="{{ $isEn ? __('Your name (optional)') : __('نام شما (اختیاری)') }}" value="{{ old('crypto_name') }}" class="mb-2"></x-input>
                        <textarea name="crypto_message" rows="4" placeholder="{{ $isEn ? __('Say something good (optional)') : __('یه چیز خوب بنویسید (اختیاری)') }}" class="py-3 px-4 w-full bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-gray-500 focus:bg-white dark:focus:bg-gray-700 placeholder-gray-500 rounded-lg">{{ old('crypto_message') }}</textarea>
                        <div class="mt-4">
                            <x-button type="purple" full>{{ $isEn ? __('Pay') : __('پرداخت') }}</x-button>
                        </div>
                    </form>
                    <div id="crypto-amounts" class="@if($errors->irr->count()) hidden @endif">
                        @foreach($user->donation['amounts_usd'] as $amount)
                            <div class="mb-3 @if($isEn) ltr font-sans @endif">
                                <a href="javascript:" onclick="showCryptoPaymentAmount({{ $amount }})" class="bg-gray-100 dark:bg-gray-800 focus:outline-none hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-lg text-black dark:text-gray-300 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                                    {{ $isEn ? '$' . $amount : latin_number_to_persian($amount) . ' دلار' }}
                                </a>
                            </div>
                        @endforeach
                        <div class="mb-3">
                            <a href="javascript:" onclick="showCryptoPaymentAmount()" class="bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 focus:outline-none hover:bg-purple-200 transition-colors text-lg text-purple-600 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                                {{ $isEn ? __('Custom Amount') : __('مبلغ دلخواه') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            <div class="mt-8 flex flex-col">
                @if($user->donation['show_supporters'])
                    <a href="{{ route('user.donate.supporters', ['username' => $user->username]) }}" class="text-center text-sm text-purple-700 mb-3">{{ $isEn ? __('Supporters') : __('لیست حامی ها') }}</a>
                @endif
                <a href="{{ route('user', ['username' => $user->username]) }}" class="text-center text-sm text-gray-600">{{ $isEn ? __('Back to') : __('برگشت به صفحه') }} {{ $user->display_name }}</a>
            </div>
        </div>
    </div>
    <script>
        function showIRRPayment() {
            document.getElementById('currency-box').classList.add('hidden');
            document.getElementById('irr-payment-box').classList.remove('hidden');
        }

        function showIRRPaymentAmount(amount = '') {
            if (amount) {
                document.getElementById('irr_amount').value = amount;
            }
            document.getElementById('irr-amounts').classList.add('hidden');
            document.getElementById('irr-payment').classList.remove('hidden');
        }

        function showCryptoPayment() {
            document.getElementById('currency-box').classList.add('hidden');
            document.getElementById('crypto-payment-box').classList.remove('hidden');
        }

        function showCryptoPaymentAmount(amount = '') {
            if (amount) {
                document.getElementById('crypto_amount').value = amount;
            }
            document.getElementById('crypto-amounts').classList.add('hidden');
            document.getElementById('crypto-payment').classList.remove('hidden');
        }
    </script>
@endsection
