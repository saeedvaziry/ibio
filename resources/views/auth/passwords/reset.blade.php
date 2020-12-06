@extends('layouts.auth')

@section('page-title'){{ __('Reset password') }}@endsection

@section('content')
    <div class="w-full sm:w-1/2 md:w-2/3 lg:w-2/5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">
            {{ __('Reset password') }}
        </h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <x-alert type="validation" class="mb-3"></x-alert>
            <x-input type="email" name="email" label="Email-Address" class="mb-3"></x-input>
            <x-input type="password" name="password" label="Password" class="mb-3"></x-input>
            <x-input type="password" name="password_confirmation" label="Password Confirmation" class="mb-3"></x-input>
            <div class="mt-6">
                <x-button type="primary" full>{{ __('Reset password') }}</x-button>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Back to login</a>
            </div>
        </form>
    </div>
@stop

