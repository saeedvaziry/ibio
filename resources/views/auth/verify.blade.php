@extends('layouts.auth')

@section('page-title'){{ __('Verify Email') }}@endsection

@section('content')
    <div class="text-gray-300">
        <a href="{{ route('home') }}">
            <img class="mx-auto h-16 w-auto" src="{{ asset('images/logo.png') }}" alt="Workflow"/>
        </a>
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold">
            {{ __('Verify Email') }}
        </h2>
    </div>
    <div class="mt-8 bg-white p-5 rounded-md shadow-md">
        @if (session('resent'))
            <x-alert type="success">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </x-alert>
        @endif
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <div class="mt-6 flex justify-end items-center">
            <form method="POST" action="{{ route('verification.resend') }}">
                <x-button type="primary">{{ __('click here to request another') }}</x-button>
            </form>
        </div>
    </div>
@stop
