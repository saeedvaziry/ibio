@extends('layouts.auth')

@section('page-title'){{ __('Login') }}@endsection

@section('content')
    <div class="w-full sm:w-1/2 md:w-2/3 lg:w-2/5 mx-auto">
        <h2 class="mb-20 text-center text-5xl font-extrabold">
            {{ __('Welcome.') }}
        </h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-alert type="validation" class="mb-3"></x-alert>
            <x-input type="text" name="email" label="Email-Address" class="mb-3"></x-input>
            <x-input type="password" name="password" label="Password" class="mb-3"></x-input>
            <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox h-4 w-4 text-primary-600 transition duration-150 ease-in-out" />
                    <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">
                        {{ __('Remember me') }}
                    </label>
                </div>
                <div class="text-sm leading-5">
                    <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            </div>
            <div class="mt-6 flex justify-end items-center">
                <x-button type="primary" full>{{ __('Log In') }}</x-button>
            </div>
        </form>
    </div>
@stop
