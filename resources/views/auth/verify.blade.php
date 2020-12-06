@extends('layouts.auth')

@section('page-title'){{ __('Verify email') }}@endsection

@section('content')
    <div class="w-full sm:w-1/2 md:w-2/3 lg:w-2/5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">
            {{ __('Verify email') }}
        </h2>
        @if (session('resent'))
            <x-alert type="success" class="mb-2">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </x-alert>
        @endif
        <p class="mb-2">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <p class="mb-2">{{ __('If you did not receive the email') }}</p>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="mt-6 flex justify-end items-center">
                <x-button type="primary">{{ __('click here to request another') }}</x-button>
            </div>
        </form>
    </div>
@stop
