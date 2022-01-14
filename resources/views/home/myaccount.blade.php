@extends('home.MainPage')

@section('title', 'My Account')

@section('bar_title', 'My Account')

@section('main')


<div class="section">
    <div class="container">
        <div class="row">
            <div id="aside" class="col-md-2">

            </div>

            <div id="main" class="col-md-10">
                @include('profile.show')
            </div>
        </div>
    </div>
</div>

@endsection