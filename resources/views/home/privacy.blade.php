@extends('layouts.home')

@section('page-title'){{ __('حریم خصوصی') }}@endsection

@section('content')
    <section id="content" class="px-5 py-10 mx-auto w-full content">
        <div class="container mx-auto">
            <div class="w-full md:w-8/12 mx-auto">
                <div class="col-12">
                    <h1 class="mb-10 text-4xl">حریم خصوصی</h1>
                    <article class="mb-10">
                        <h2 class="mb-3">چه اطلاعاتی از کاربران نگهداری می شود</h2>
                        <p>اطلاعاتی که کاربران نگهداری میشود شامل آدرس ایمیل و تمامی داده هایی که بعد از ثبت نام در حساب کاربری وارد کرده اند شامل تصویر پروفایل، نام و لینکها و ... می باشد.</p>
                    </article>
                    <article class="mb-10">
                        <h2 class="mb-3">اطلاعات تراکنش ها</h2>
                        <p>تمامی اطلاعات دریافتی از سرویس دهنده پرداخت مانند شماره کارت پرداخت کننده و آدرس آی پی بعد از انجام تراکنش در ibio.link ذخیره میشود.</p>
                    </article>
                    <article class="mb-10">
                        <h2 class="mb-3">اطلاعات بازدید ها و کلیک ها</h2>
                        <p>به ازای هر بازدید و کلیک بر روی لینک های کاربران، آدرس آی پی و اطلاعات مرورگر (user-agent) بازدید کننده دریافت و ذخیره میشود.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
