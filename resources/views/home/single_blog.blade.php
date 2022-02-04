@extends('home.MainPage')

@section('title', $blog->title)

@section('bar_title', $blog->title)

@section('main')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
    div.stars {
        width: 270px;
        display: inline-block
    }

    .mt-200 {
        margin-top: 200px
    }

    input.star {
        display: none
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 36px;
        color: #4A148C;
        transition: all .2s
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952
    }

    input.star-1:checked~label.star:before {
        color: #F62
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3)
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome
    }

    .navbar-nav {
        width: 100%
    }

    @media(min-width:568px) {
        .end {
            margin-left: auto
        }
    }

    @media(max-width:768px) {
        #post {
            width: 100%
        }
    }

    #clicked {
        padding-top: 1px;
        padding-bottom: 1px;
        text-align: center;
        width: 100%;
        background-color: #ecb21f;
        border-color: #a88734 #9c7e31 #846a29;
        color: black;
        border-width: 1px;
        border-style: solid;
        border-radius: 13px
    }

    #profile {
        background-color: unset
    }

    #post {
        margin: 10px;
        padding: 6px;
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: center;
        background-color: #ecb21f;
        border-color: #a88734 #9c7e31 #846a29;
        color: black;
        border-width: 1px;
        border-style: solid;
        border-radius: 13px;
        width: 50%
    }

    body {
        background-color: black
    }

    #nav-items li a,
    #profile {
        text-decoration: none;
        color: rgb(224, 219, 219);
        background-color: black
    }

    .comments {
        margin-top: 5%;
        margin-left: 20px
    }

    .darker {
        border: 1px solid #ecb21f;
        background-color: black;
        float: right;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px
    }

    .comment {
        border: 1px solid rgba(16, 46, 46, 1);
        background-color: rgba(16, 46, 46, 0.973);
        float: left;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px
    }

    .comment h4,
    .comment span,
    .darker h4,
    .darker span {
        display: inline
    }

    .comment p,
    .comment span,
    .darker p,
    .darker span {
        color: rgb(184, 183, 183)
    }

    h1,
    h4 {
        color: white;
        font-weight: bold
    }

    label {
        color: rgb(212, 208, 208)
    }

    #align-form {
        margin-top: 20px
    }

    .form-group p a {
        color: white
    }

    #checkbx {
        background-color: black
    }

    #darker img {
        margin-right: 15px;
        position: static
    }

    .form-group input,
    .form-group textarea {
        background-color: black;
        border: 1px solid rgba(16, 46, 46, 1);
        border-radius: 12px
    }

    form {
        border: 1px solid rgba(16, 46, 46, 1);
        background-color: rgba(16, 46, 46, 0.973);
        border-radius: 5px;
        padding: 20px
    }
</style>

<div class="blog-entries" style="background-color:lightseagreen;">
    <div class="container">
        <div class="col-md-9">
            <div class="blog-posts">
                <div class="row">
                    <div class="col-md-12">
                        @if($blog)
                        <div class="single-blog-post">
                            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-interval="10000">
                                        @if($blog->image)<img src="{{ Storage::url($blog->image) }}" class="d-block w-100" alt="...">@endif
                                    </div>
                                    @if($images)
                                    @foreach($images as $image)
                                    <div class="carousel-item" data-interval="2000">
                                        <img src="{{ Storage::url($image->image) }}" class="d-block w-100" alt="...">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="text-content">
                                <h2>{{ $blog->title }}</h2>
                                <span><a href="#">Admin</a> / <a href="#">16 September 2018</a> / <a href="#">Branding</a></span>
                                @if($blog->file)<p>Open the PDF <a href="{{ Storage::url($blog->file) }}" target="_blank">File</a></p>@endif
                                <p>{!! $blog->description !!}
                                </p>
                                <div class="tags-share">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="tags">
                                                @if($category)
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-body">
                                        <section>
                                            <div class="container">
                                                <div class="row">
                                                    <h1>Comments</h1>
                                                    @foreach($blog->comments as $comment)
                                                    @if($comment->status == "true")
                                                    <div style="width: 100%;" class="darker mt-4 text-justify">
                                                        <div>
                                                            <h4>{{ $comment->user->name }}</h4>
                                                        </div>
                                                        <div> Date: {{ $comment->created_at }}</div>
                                                        <div> Rate: {{ $comment->rate }}</div>
                                                        <p style="width: 100%; float:left;">{{ $comment->comment }}</p>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                        @auth
                                        <form action="{{ route('Saving Comment', ['id' => $blog->id, 'user_id' => Auth::user()->id]) }}" method='POST'>
                                            @csrf
                                            <div class="form-group">
                                                <h4>Leave a comment</h4> <label for="comment">Comment</label> <textarea name="comment" id="comment" msg cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label style="font-size:xx-large; float:left;" for="rate">Rate: </label>
                                                <div class="container d-flex justify-content-center">
                                                    <div class="stars">
                                                        <input class="star star-5" id="star-5" type="radio" name="rate" value="5" />
                                                        <label class="star star-5" for="star-5"></label>
                                                        <input class="star star-4" id="star-4" type="radio" name="rate" value="4" />
                                                        <label class="star star-4" for="star-4"></label>
                                                        <input class="star star-3" id="star-3" type="radio" name="rate" value="3" />
                                                        <label class="star star-3" for="star-3"></label>
                                                        <input class="star star-2" id="star-2" type="radio" name="rate" value="2" />
                                                        <label class="star star-2" for="star-2"></label>
                                                        <input class="star star-1" id="star-1" type="radio" name="rate" value="1" />
                                                        <label class="star star-1" for="star-1"></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input id="submit" type="submit" class="form-control btn-facebook" value='Send Message'>
                                            </div>
                                        </form>
                                        @endauth

                                        @guest
                                        <div class="alert alert-danger">
                                            <h3>Please login to post a comment</h3>
                                        </div>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection