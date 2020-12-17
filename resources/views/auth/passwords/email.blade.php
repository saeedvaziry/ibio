@extends('layouts.auth')

@section('page-title'){{ __('بازیابی کلمه عبور') }}@endsection

@section('content')
    <div class="w-full sm:w-1/2 md:w-2/3 lg:w-2/5 mx-auto">
        <h2 class="mb-12 text-center text-5xl font-extrabold">
            {{ __('بازیابی کلمه عبور') }}
        </h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <x-alert type="validation" class="mb-3"></x-alert>
            @if(session()->has('status'))
                <x-alert type="success" class="mb-3">{{ session()->get('status') }}</x-alert>
            @endif
            <x-input type="text" name="email" label="آدرس ایمیل" class="mb-3"></x-input>
            <div class="mt-6">
                <x-button type="primary" full>{{ __('بازیابی کلمه عبور') }}</x-button>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}">بازگشت به ورود</a>
            </div>
        </form>
    </div>
@stop
