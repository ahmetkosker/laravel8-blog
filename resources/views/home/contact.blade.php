@php
$setting = \App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.MainPage')

@section('title', 'Contact')

@section('bar_title', 'Contact')

@section('main')

<div class="page-heading">
    <div class="container">
        <div class="heading-content">
            <h1>Contact</h1>
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
                    <p>{!! $setting->contact !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="more-about-us">
    <div class="container">
        <div class="col-md-5 col-md-offset-7">
            <div class="content">
                <div class="card">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <h5 class="card-header">Contact Form</h5>
                    <div class="card-body">
                        <form action="{{ route('contact form') }}" method='POST'>
                            @csrf
                            <div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name</label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone</label>
                                <input id="phone" type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input id="email" type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-form-label">Subject</label>
                                <input id="subject" type="text" name="subject" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" style="color: black;" rows="10" cols="38" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input id="submit" type="submit" class="form-control btn-facebook" value='Send Message'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection