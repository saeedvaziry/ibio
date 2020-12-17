@extends('layouts.auth')

@section('page-title'){{ __('تایید ایمیل') }}@endsection

@section('content')
    <div class="w-full sm:w-1/2 md:w-2/3 lg:w-2/5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">
            {{ __('تایید ایمیل') }}
        </h2>
        @if (session('resent'))
            <x-alert type="success" class="mb-2">
                {{ __('لینک تایید آدرس ایمیل برایتان ارسال شد') }}
            </x-alert>
        @endif
        <p class="mb-2">{{ __('لطفا ایمیلتان را برای تایید بررسی کنید') }}</p>
        <p class="mb-2">{{ __('در صورتی که ایمیلی دریافت نکردید') }}</p>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="mt-6 flex justify-end items-center">
                <x-button type="primary">{{ __('اینجا کلیک کنید تا دوباره ارسال شود') }}</x-button>
            </div>
        </form>
    </div>
@stop
