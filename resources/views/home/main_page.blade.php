@extends('home.MainPage')

@section('title', 'Home')

@section('bar_title', 'Home')

@section('main')

<div id="video-container">
    <div class="video-overlay"></div>
    <div class="video-content" style="background: rgb(0,36,19); background: linear-gradient(90deg, rgba(0,36,19,1) 39%, rgba(0,0,0,1) 98%, rgba(9,121,107,0) 100%);">
        <div class="inner">
            <h1>Welcome to <em>@if(isset($setting->title)) {{ $setting->title }}@endif
                </em></h1>
            <div class="scroll-icon">
                <a class="scrollTo" data-scrollTo="portfolio" href="#"><img src="blog/img/scroll-icon.png" alt=""></a>
            </div>
        </div>
    </div>

</div>

<div class="full-screen-portfolio" id="portfolio">
    <div class="container-fluid">
        <h1 style="color: white; text-align:center; background: rgb(0,0,0);
background: radial-gradient(circle, rgba(0,0,0,1) 77%, rgba(0,0,199,1) 97%, rgba(238,174,202,1) 100%); padding: 25px;">Random Blogs</h1>
    @if($blogs)
        @foreach($blogs as $blog)
        <div class="col-md-4 col-sm-6">
            <div class="portfolio-item">
                <a href="{{ route('Single Blog', ['id' => $blog->id, 'slug' => $blog->slug]) }}">
                    <div class="thumb">
                        <div class="hover-effect">
                            <div class="hover-content">
                                <h1>{{ $blog->title }}</h1>
                                <p>Contuinue Reading</p>
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ Storage::url($blog->image) }}" width="200" height="250">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    @else
    <h1 style="text-align:center;" class='alert alert-warning'>There are no blogs yet</h1>
    @endif
    </div>
</div>

@endsection