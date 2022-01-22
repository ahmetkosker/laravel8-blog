@extends('admin.admin_main')

@section('title', 'Adding Blog')

@section('main')



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
                                <form action="/admin/blog/add" method='POST' enctype='multipart/form-data'>
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
                                        <label for="input-select">Status</label>
                                        <select style="height:70%;" name='status' class="form-control" id="status">
                                            <option value="true">True</option>
                                            <option value="false" selected>False</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Image</label>
                                        <input id="image" type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="blogfile" class="col-form-label">File</label>
                                        <input id="blogfile" type="file" multiple name="blogfile" accept=".pdf,.doc" class="form-control">
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


@endsection