@php
$setting = \App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.MainPage')

@section('title', 'About Us')

@section('bar_title', 'About Us')


@section('main')

<div class="page-heading">
    <div class="container">
        <div class="heading-content">
            <h1>About <em>Us</em></h1>
        </div>
    </div>
</div>

<div class="services">
    <div style="text-align:center;" class="container">

        <div style="text-align:center;" class="col-md-12 col-sm-6">
            <div class="service-item">
                <div class="icon">
                    <img src="img/service_2.png" alt="">
                </div>
                <div class="text">
                @if(isset($setting->aboutus))<p>{!! $setting->aboutus !!}</p>@endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection