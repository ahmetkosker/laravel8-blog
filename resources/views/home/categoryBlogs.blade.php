@php
$setting = \App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.MainPage')

@section('title', $category->title)

@section('bar_title', 'Contact')

@section('main')



<div class="page-heading">

    <div class="container">
        <div class="heading-content">
            <h1>{{ $category->title }}</em></h1>
        </div>
    </div>
</div>

<div class="blog-entries">
    <div class="container">
        <div class="col-md-9">
            <div class="blog-posts">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-md-12">
                        <div class="blog-post">
                            <img src="{{ Storage::url($blog->image) }}" alt="">
                            <div class="text-content">
                                <span><a href="#">2022</a></span>
                                <h2>{{ $blog->title }}</h2>
                                <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow:hidden;">
                                    {{ $blog->keywords }}
                                    <br><br>
                                </p>
                                <div class="simple-btn">
                                    <a href="{{ route('Single Blog', ['id' => $category->id, 'slug' => $blog->slug]) }}">continue reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@endsection