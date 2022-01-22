@extends('admin.admin_main')

@section('title', 'Edit category')

@section('main')


<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Editing Category</h3>
                        </div>
                        <div class="card">

                            <div class="card-body">
                                <form action="" method='POST'>
                                    @method('PUT')
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
                                        <label for="input-select">Parent</label>
                                        <select style="height:70%;" name='parent' class="form-control" id="input-select">
                                            <option value='0'>Main Category</option>
                                            @if(isset($data))
                                            @foreach ($data as $data)
                                            <option value="{{ $data->id }}">
                                                {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data, $data->title) }}
                                            </option>
                                            @endforeach
                                            @else
                                            @endif
                                        </select>
                                    </div>
                                    <div>
                                    </div>
                                    @foreach($category as $category)
                                    <div class="form-group">
                                        <label for="title" class="col-form-label">Title</label>
                                        <input id="title" type="text" name="title" value="{{ $category->title }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords" class="col-form-label">Keywords</label>
                                        <input id="keywords" type="text" name="keywords" value="{{ $category->keywords }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Description</label>
                                        <input id="description" type="text" name="description" value="{{ $category->description }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug" class="col-form-label">Slug</label>
                                        <input id="slug" type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-select">Status</label>
                                        <select style="height:70%;" name='status' class="form-control" id="status">
                                            <option @if($category->status == "true") selected @endif value="true">True</option>
                                            <option @if($category->status == "false") selected @endif value="false">False</option>
                                        </select>
                                    </div>
                                    @endforeach
                                    <div class="form-group">
                                        <input id="submit" type="submit" class="form-control btn-facebook" value='Submit'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection