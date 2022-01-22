@extends('admin.admin_main')

@section('title', 'Blogs')

@section('main')

@php
@endphp

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Blogs</h5>
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <a href="{{ route('creating blog') }}" class='btn btn-primary' style='color:aliceblue;'>Add a new blog</a>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                @if(isset($data))
                                <thead>
                                    <tr>
                                        <th style='text-align:center;'>ID</th>
                                        <th style='text-align:center;'>User Name</th>
                                        <th style='text-align:center;'>Category</th>
                                        <th style='text-align:center;'>Title</th>
                                        <th style='text-align:center;'>Status</th>
                                        <th style='text-align:center;'>Image</th>
                                        <th style='text-align:center;'>Image Gallery</th>
                                        <th style='text-align:center;'>Edit</th>
                                        <th style='text-align:center;'>Delete</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $blog)
                                <tbody>
                                    <tr>
                                        <td style=' text-align:center;'>{{ $blog->id }}</td>
                                        <td style=' text-align:center;'>{{ $blog->user_id }}</td>
                                        <td style=' text-align:center;'>{{ $blog->category->title }}</td>
                                        <td style=' text-align:center;'>{{ $blog->title }}</td>
                                        <td style=' text-align:center;'>{{ $blog->status }}</td>
                                        <td>
                                            <img style="display: block; margin: auto;" src=" {{ Storage::url($blog->image) }}" height='80' weight='80' alt="">
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/image/add', $blog->id) }}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')"> <img style="display: block; margin: auto;" src="{{asset('assets/images')}}/gallery.png" height='60' weight='60' alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <div style=' text-align:center;'>
                                                <a href="{{ url('/admin/blog/edit/'.$blog->id) }}" class='text-primary' style='border:none; font-size:45px;'><i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('destroying a blog', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <div style=' text-align:center;'>
                                                    <button type='submit' style='border:none; color:red; font-size:45px;'>
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                                @endforeach
                                @else
                                <h2><b>There are no blogs</b></h2>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection