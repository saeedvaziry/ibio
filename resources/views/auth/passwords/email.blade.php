@extends('layouts.auth')

@section('page-title'){{ __('Forget Password?') }}@endsection

@section('content')
    <div class="text-gray-300">
        <a href="{{ route('home') }}">
            <img class="mx-auto h-16 w-auto" src="{{ asset('images/logo.png') }}" alt="Workflow"/>
        </a>
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold">
            {{ __('Forget Password?') }}
        </h2>
    </div>
    <form class="mt-8 bg-white p-5 rounded-md shadow-md" method="POST" action="{{ route('password.email') }}">
        @csrf
        <x-alert type="validation" class="mb-3"></x-alert>
        @if(session()->has('status'))
            <x-alert type="success" class="mb-3">{{ session()->get('status') }}</x-alert>
        @endif
        <x-input type="email" name="email" label="Email-Address" class="mb-3"></x-input>
        <div class="mt-6 flex justify-end items-center">
            <a href="{{ route('login') }}" class="mr-3">{{ __("Already have one?") }}</a>
            <x-button type="primary">{{ __('Reset Password') }}</x-button>
        </div>
    </form>
@stop
