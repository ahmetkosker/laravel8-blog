@php
$setting = \App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.MainPage')

@section('title', 'References')

@section('bar_title', 'References')

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
                    <p>{!! $setting->references !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection