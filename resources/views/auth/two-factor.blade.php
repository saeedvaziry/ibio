@extends('layouts.auth')

@section('page-title'){{ __('Login') }}@endsection

@section('content')
    <div class="text-gray-300">
        <a href="{{ route('home') }}">
            <img class="mx-auto h-16 w-auto" src="{{ asset('images/logo.png') }}" alt="Workflow"/>
        </a>
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold">
            {{ __('Verify your login') }}
        </h2>
    </div>
    <form class="mt-8 bg-white p-5 rounded-md shadow-md" method="POST" action="{{ route('login.verify') }}">
        @csrf
        <x-alert type="validation" class="mb-3"></x-alert>
        <x-input type="text" name="code" label="6 digits, one time password" class="mb-3"></x-input>
        <div class="mt-6 flex justify-end items-center">
            <x-button type="primary">{{ __('verify') }}</x-button>
        </div>
    </form>
@stop
