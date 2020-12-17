@extends('layouts.auth')

@section('page-title'){{ __('Login') }}@endsection

@section('content')
    <div class="w-full sm:w-1/2 md:w-2/3 lg:w-2/5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">
            {{ __('خوش آمدید') }}
        </h2>
        @include('auth.social')
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-alert type="validation" class="mb-3"></x-alert>
            <x-input type="email" name="email" label="آدرس ایمیل" class="mb-3"></x-input>
            <x-input type="password" name="password" label="کلمه عبور" class="mb-3"></x-input>
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm leading-5">
                    <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        {{ __('کلمه عبور را فراموش کرده ام') }}
                    </a>
                </div>
            </div>
            <div class="mt-6">
                <x-button type="primary" full>{{ __('ورود') }}</x-button>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
            </div>
        </form>
    </div>
@stop
