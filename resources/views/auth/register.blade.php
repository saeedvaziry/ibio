@extends('layouts.auth')

@section('page-title'){{ __('ثبت نام') }}@endsection

@section('content')
    <div class="w-full sm:w-1/2 md:w-2/3 lg:w-2/5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">
            {{ __('ثبت نام') }}
        </h2>
        @include('auth.social')
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <x-alert type="validation" class="mb-3"></x-alert>
            <x-input type="text" name="name" label="نام" class="mb-3"></x-input>
            <x-input type="email" name="email" label="آدرس ایمیل" class="mb-3"></x-input>
            <x-input type="password" name="password" label="کلمه عبور" class="mb-3"></x-input>
            <x-input type="password" name="password_confirmation" label="تایید کلمه عبور" class="mb-3"></x-input>
            <div class="mt-6">
                <p class="mb-3">
                    {{ __('ثبت نام به معنای قبول') }}
                    <a class="text-purple-600" href="{{ route('home.terms') }}" target="_blank">قوانین</a>
                    {{ __('می باشد') }}
                </p>
                <x-button type="primary" full>{{ __('ثبت نام') }}</x-button>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}">برگشت به ورود</a>
            </div>
        </form>
    </div>
@stop
