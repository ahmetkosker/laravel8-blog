@extends('admin.admin_main')

@section('title', 'Edit blog')

@section('main')


<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <div class="page-section" id="overview">
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                        </div>
                        <div class="card">
                            <h5 class="card-header">Editing Blog</h5>
                            <div class="card-body">
                                <form action="" method='POST' enctype='multipart/form-data'>
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="input-select">Category</label>
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
                                        <label for="title" class="col-form-label">Title</label>
                                        <input id="title" type="text" name="title" value="{{ $blog->title }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords" class="col-form-label">Keywords</label>
                                        <input id="keywords" type="text" name="keywords" value="{{ $blog->keywords }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="summernote">Description</label>
                                        <textarea id="summernote" name="description" class='form-group'>{{ $blog->description }}</textarea>
                                        <script>
                                            $(document).ready(function() {
                                                $('#summernote').summernote();
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug" class="col-form-label">Slug</label>
                                        <input id="slug" type="text" name="slug" value="{{ $blog->slug }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-select">Status</label>
                                        <select style="height:70%;" name='status' class="form-control" id="status">
                                            <option @if($blog->status == "true") selected @endif value="true">True</option>
                                            <option @if($blog->status == "false") selected @endif value="false">False</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Image</label>
                                        <input id="image" type="file" name="image" value="{{ Storage::url($blog->image) }}" class="form-control">

                                        @if($blog->image)
                                        <img src="{{ Storage::url($blog->image) }}" height="60" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="blogfile" class="col-form-label">File</label>
                                        <input id="blogfile" type="file" name="blogfile" accept=".pdf,.doc" class="form-control">
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

        </div>
    </div>

</div>


@endsection