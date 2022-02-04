@extends('home.MainPage')

@section('title', 'Editing Blog')

@section('bar_title', 'Home')

@section('main')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="https://summernote.org/vendors/summernote/dist/summernote-bs4.css">
<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
<link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/libs/css/style.css">
<link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
<link rel="stylesheet" type="text/css" href="/assets/vendor/datatables/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="/assets/vendor/datatables/css/buttons.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="/assets/vendor/datatables/css/select.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="row">
    <div style="margin:75px;" class="col-xl-10">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header" id="top">
                    <h2 style="color:white;" class="pageheader-title">Editing Blog </h2>
                </div>
            </div>
        </div>
        <div class="page-section" id="overview">
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method='POST' enctype='multipart/form-data'>
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label style="color:white;" for="input-select">Category</label>
                                <select style="height:70%;" name='category_id' class="form-control" id="input-select">
                                    @if(isset($category))
                                    @foreach ($category as $category)
                                    <option @if($category->id == $blog->category_id) selected="selected" @endif value={{ $category->id  }}>{{ $category->title  }}</option>
                                    @endforeach
                                    @else
                                    @endif
                                </select>
                            </div>
                            <div>
                            </div>
                            @if($blog)
                            <div class="form-group">
                                <label style="color:white;" for="title" class="col-form-label">Title</label>
                                <input id="title" type="text" name="title" value="{{ $blog->title }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label style="color:white;" for="keywords" class="col-form-label">Keywords</label>
                                <input id="keywords" type="text" name="keywords" value="{{ $blog->keywords }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label style="color:white;" for="summernote">Description</label>
                                <textarea id="summernote" name="description" class='form-group'>{{ $blog->description }}</textarea>
                                <script>
                                    $(document).ready(function() {
                                        $('#summernote').summernote();
                                    });
                                </script>
                            </div>
                            <div class="form-group">
                                <label style="color:white;" for="slug" class="col-form-label">Slug</label>
                                <input id="slug" type="text" name="slug" value="{{ $blog->slug }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label style="color:white;" for="image" class="col-form-label">Image</label>
                                <input id="image" type="file" name="image" value="{{ Storage::url($blog->image) }}" class="form-control">

                                @if($blog->image)
                                <img src="{{ Storage::url($blog->image) }}" height="60" alt="">
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="submit" type="submit" class="form-control btn-facebook" value='Submit'>
                            </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- sidenavbar -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end sidenavbar -->
    <!-- ============================================================== -->
</div>

@endsection