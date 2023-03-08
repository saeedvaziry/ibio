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
            <h2>Google Analytics</h2>
            <p>
                We use Google Analytics to collect information about how visitors use our website. Google Analytics uses cookies to collect information about your use of the website, including your IP address, the pages you visit, and other clickstream data. We use this information to improve our website and to better understand our visitors' needs.
            </p>
            <p>
                Google Analytics may also collect information about the device you use to access our website, such as the type of device and operating system you are using, your browser type and version, and your device's screen size. This information is used to improve our website's performance and to ensure that our website displays correctly on your device.
            </p>
            <p>
                You can learn more about how Google uses your data by visiting Google's Privacy Policy page.
            </p>
            <h2>Changes to This Privacy Policy</h2>
            <p>We may update this Privacy Policy from time to time.</p>
        </div>
    </div>
@endsection
