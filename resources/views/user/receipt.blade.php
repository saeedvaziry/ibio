@php($title = __('رسید پرداخت'))
@php($user = $payment->user)

@extends('layouts.user')

@section('content')
    @if(auth()->check() && auth()->user()->id == $payment->user->id)
        <a href="{{ route('donation.settings') }}" class="bg-purple-100 text-purple-700 py-2 h-16 flex items-center justify-center mb-5 cursor-pointer">
            {{ __('تنظیمات حمایت مالی') }}
        </a>
    @endif
    <div class="w-full flex justify-center">
        <div class="p-5 w-full md:w-6/12 lg:5/12 xl:w-3/12 text-center">
            <h2 class="text-black text-2xl mb-8 @if($success) text-green-600 @else text-red-600 @endif">
                @if($success) {{ __('پرداخت شد! 🎉') }} @else {{ __('پرداخت نشد! ☹️') }} @endif
            </h2>
            @if($success)
                <p class="whitespace-pre-wrap mb-4">{{ $payment->user->donation['thank_you_message'] }}</p>
                @if(isset($payment->payment_info['transId']))
                    <p>{{ __('شماره تراکنش') }}: {{ $payment->payment_info['transId'] }}</p>
                @endif
            @else
                @if(isset($error))
                    <p class="mb-4">{{ $error }}</p>
                @else
                    <p class="mb-4">{{ __('خطایی هنگام پرداخت رخ داده') }}</p>
                @endif
                @if(isset($retry) && $retry)
                    <p class="mb-3">{{ __('مایلید دوباره تلاش کنید؟') }}</p>
                    <a href="{{ $payment->payirUrl() }}" class="bg-purple-100 focus:outline-none hover:bg-purple-200 transition-colors text-lg text-purple-600 py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">
                        {{ __('انتقال به صفحه پرداخت') }}
                    </a>
                @endif
            @endif
            <div class="mt-8">
                <a href="{{ route('user', ['username' => $payment->user->username]) }}" class="text-center text-sm text-gray-600">{{ __('برگشت به صفحه') }} {{ $payment->user->name }}</a>
            </div>
        </div>
    </div>
@endsection
