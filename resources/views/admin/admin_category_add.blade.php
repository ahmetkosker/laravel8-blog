@extends('admin.admin_main')

@section('title', 'Adding category')

@section('main')



<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">

                            <h5 class="card-header">Adding Category</h5>
                            <div class="card-body">
                                <form action="{{ route('adding category post') }}" method='POST'>
                                    @csrf
                                    <div class="form-group">
                                        <label for="input-select">Parent</label>
                                        <select name='parent' class="form-control" id="input-select" style="height: 40px;">
                                            <option value='0'>Main Category</option>
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
                                        <label for="description" class="col-form-label">Description</label>
                                        <input id="description" type="text" name="description" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug" class="col-form-label">Slug</label>
                                        <input id="slug" type="text" name="slug" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-select">Status</label>
                                        <select name='status' class="form-control" id="status" style="height: 40px;">
                                            <option value="true">True</option>
                                            <option value="false" selected>False</option>
                                        </select>
                                    </div>
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
</div>



@endsection