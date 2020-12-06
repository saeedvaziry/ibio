@extends('layouts.auth')

@section('page-title'){{ __('Login') }}@endsection

@section('content')
    <div class="w-full sm:w-1/2 md:w-2/3 lg:w-2/5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">
            {{ __('Verify your login') }}
        </h2>
        <form method="POST" action="{{ route('login.verify') }}">
            @csrf
            <x-alert type="validation" class="mb-3"></x-alert>
            <x-input type="text" name="code" label="6 digits, one time password" class="mb-3"></x-input>
            <div class="mt-6 flex justify-end items-center">
                <x-button type="primary" full>{{ __('Verify and login') }}</x-button>
            </div>
        </form>
    </div>
@stop
