@extends('home.MainPage')

@section('title', 'Adding Blogs')

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

<div style="margin-top: 9%; background-color:white;" class="card-body">

    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="section-block" id="basicform">
                                <h3 class="section-title">Adding Blog</h3>
                            </div>
                            <div class="card">

                                <!-- <select id='file' name='file' class="form-control" id="input-select">
                                <option value='0'>Writing</option>
                                <option value='1'>PDF</option>
                                <option value='2'>Image</option>
                            </select>
                            <script>
                                document.getElementById('file').addEventListener('change', function() {
                                    if (this.value == 0) {
                                        document.getElementById('writing').style.display = "block";
                                        document.getElementById('pdf').style.display = "none";
                                        document.getElementById('image').style.display = "none";
                                    } else if (this.value == 1) {
                                        document.getElementById('writing').style.display = "none";
                                        document.getElementById('pdf').style.display = "block";
                                        document.getElementById('image').style.display = "none";
                                    } else {
                                        document.getElementById('writing').style.display = "none";
                                        document.getElementById('pdf').style.display = "none";
                                        document.getElementById('image').style.display = "block";
                                    }
                                });
                            </script> -->
                                <div id="writing" style='display:block;' class="card-body ">
                                    <form action="{{ route('user creating blog', ['user_id' =>  Auth::user()->id]) }}" method='POST' enctype='multipart/form-data'>
                                        @csrf
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="input-select">Category</label>
                                            <select style="height:70%;" name='category_id' class="form-control" id="input-select">
                                                @if(isset($data))
                                                @foreach ($data as $data)
                                                <option value={{ $data->id  }}>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data, $data->title) }}</option>
                                                @endforeach
                                                @else
                                                @endif
                                            </select>
                                        </div>
                                        <div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Title</label>
                                            <input id="title" type="text" name="title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords" class="col-form-label">Keywords</label>
                                            <input id="keywords" type="text" name="keywords" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="col-form-label">Slug</label>
                                            <input id="slug" type="text" name="slug" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="summernote">Description</label>
                                            <textarea id="summernote" name="description" class='form-group'></textarea>
                                            <script>
                                                $(document).ready(function() {
                                                    $('#summernote').summernote();
                                                });
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="col-form-label">Image</label>
                                            <input id="image" type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input id="submit" type="submit" class="form-control btn-facebook" value='Submit'>
                                        </div>

                                    </form>
                                </div>
                                <!-- <div id="pdf" style='display:none;' class=" card-body">
                                <form action="/admin/blog/add" method='POST'>
                                    @csrf
                                    <div class="form-group">
                                        <input id="file" type="file" class="form-control btn-facebook" value='Submit'>
                                    </div>
                                    <div class="form-group">
                                        <input id="submit" type="submit" class="form-control btn-facebook" value='Submit'>
                                    </div>
                                </form>
                            </div>
                            <div id="image" style='display:none;' class="card-body">
                                <form action="/admin/blog/add" method='POST'>
                                    @csrf
                                    <div class="form-group">
                                        <input id="file" type="file" class="form-control btn-facebook" value='Submit'>
                                    </div>
                                    <div class="form-group">
                                        <input id="submit" type="submit" class="form-control btn-facebook" value='Submit'>
                                    </div>
                                </form>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://summernote.org/vendors/summernote/dist/summernote-bs4.min.js"></script>
<script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<script src="/assets/libs/js/main-js.js"></script>
<script src="/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/vendor/datatables/js/data-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@endsection