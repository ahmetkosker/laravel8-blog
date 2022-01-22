@extends('admin.admin_main')

@section('title', 'Categories')

@section('main')



<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Categories</h5>
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <a href="/admin/category/add" class='btn btn-primary' style='color:aliceblue;'>Add a new category</a>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                @if(isset($categories))
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Parent</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                @foreach ($categories as $category)
                                <tbody>
                                    <tr>
                                        <td style=' text-align:center;'>{{ $category->id }}</td>
                                        <td style=' text-align:center;'>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($category, $category->title) }}</td>
                                        <td style=' text-align:center;'>{{ $category->title }}</td>
                                        <td style=' text-align:center;'>{{ $category->status }}</td>
                                        <td style=' text-align:center;'><a href="{{ url('/admin/category/edit/'.$category->id) }}" class='btn btn-primary'>Edit</a></td>
                                        <form style=' text-align:center;' action="{{ route('destroying a category', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td><input type='submit' class='btn btn-danger' value='Delete'></td>
                                        </form>
                                    </tr>
                                </tbody>
                                @endforeach
                                @else
                                <h2><b>There are no categories</b></h2>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>



@endsection