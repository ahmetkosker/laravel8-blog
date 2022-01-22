@extends('home.MainPage')

@section('title', 'My Account')

@section('bar_title', 'My Account')

@section('main')

<div id="main" style="margin-top:5%;">
    @include('profile.show')
</div>

@endsection