@extends('layouts.home')

@section('page-title')
    {{ __("Terms of Use | iBio") }}
@endsection

@section('content')
    <div class="container w-full py-20 px-5 mx-auto px-5" style="min-height: calc(100vh - 134px)">
        <div class="prose-xl">
            <h1>{{ __("Terms of Use") }}</h1>
            <p>Registering in iBio means that you have accepted all of the terms of conditions.</p>
            <h2>Account</h2>
            <p>iBio is FREE and everyone is allowed to create their account.</p>
            <p>You’re responsible for anything that happens to your account, so keep your login details and password safe and don’t share them with anyone. If you think your account has been compromised, please contact us immediately.</p>
            <h2>Content</h2>
            <p>Everything you post on iBio including links, texts, videos and music tracks are considered as content.</p>
            <p>You can use iBio to post your content if:</p>
            <ul>
                <li>none of your content will violate the privacy, publicity, IP or other rights of anyone else</li>
                <li>your content will not (i) be misleading or deceptive, intended or designed to misinform, or likely to misinform a reasonable person, (ii) cause either of us to break any laws or legal obligations, and (iii) bring us into disrepute or damage our reputation</li>
                <li>your content doesn’t contain any viruses or other harmful code, files, or programs designed to interrupt or damage the functionality of the Platform or any other software, hardware or device</li>
            </ul>
        </div>
    </div>
@endsection
