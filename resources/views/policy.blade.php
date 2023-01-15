@extends('layouts.home')

@section('page-title')
    {{ __("Privacy Policy | iBio") }}
@endsection

@section('content')
    <div class="container w-full py-20 px-5 mx-auto px-5" style="min-height: calc(100vh - 134px)">
        <div class="prose-xl">
            <h1>{{ __("Privacy Policy") }}</h1>
            <p>iBio has been built on privacy!</p>
            <h2>Data</h2>
            <p>Here are a list of data that we store:</p>
            <ul>
                <li>Name and Email address provided during the registration</li>
                <li>Links that you add into our system</li>
                <li>Statistics of your Links and your Page including:</li>
                <ul>
                    <li>IP and Country of the visitor</li>
                    <li>Public information of the device (User-Agent)</li>
                    <li>Referred address if there is any</li>
                </ul>
            </ul>
            <h2>Link Deletion</h2>
            <p>Deleted links are not possible to be restored. When you delete a link, It will be deleted completely from our database. Also it's metrics (visitor information) will be deleted.</p>
            <h2>Account Deletion</h2>
            <p>Deleted accounts are not possible to be restored. When you delete your account, We will erase the account and everything related to that account including (links and metrics) from our database.</p>
        </div>
    </div>
@endsection
