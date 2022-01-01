@extends('profile.admin_main')

@section('title', 'Adding Image')

@section('main')



<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Adding Image</h3>
                        </div>
                        <div class="card">
                            @foreach ($data as $blog)
                            <h5 class="card-header">{{ $blog->title }}</h5>
                            @endforeach
                            <div id="writing" style='display:block;' class="card-body ">
                                <form action="{{ route('adding a new image', $blog->id) }}" method='POST' enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-group">
                                        <label for="title" class="col-form-label">Title</label>
                                        <input id="title" type="text" name="title" class="form-control">
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        @if(isset($images))
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        @foreach ($images as $image)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $image->title }}
                                                </td>
                                                <td>
                                                    <img src="{{ Storage::url($image->image) }}" height='80' weight='80' alt="">
                                                </td>
                                                @foreach ($data as $blog)
                                                <form action="{{ route('destroying an image', ['blog_id' => $blog->id, 'image_id' => $image->id]) }}" method="POST">
                                                    @endforeach
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
                                        <h2><b>There are no categories</b></h2>
                                        @endif
                                    </table>
                                </div>
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
            <!-- ============================================================== -->
            <!-- sidenavbar -->
            <!-- ============================================================== -->
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                <div class="sidebar-nav-fixed">
                    <ul class="list-unstyled">
                        <li><a href="#overview" class="active">Overview</a></li>
                        <li><a href="#basicform">Basic Form</a></li>
                        <li><a href="#select">Select</a></li>
                        <li><a href="#checkboxradio">Checkbox &amp; Radio</a></li>
                        <li><a href="#validation">Validation state</a></li>
                        <li><a href="#inputgroup">Input Groups</a></li>
                        <li><a href="#inputmask">Inputmask</a></li>
                        <li><a href="#switchcontent">Switch Content</a></li>
                        <li><a href="#top">Back to Top</a></li>
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end sidenavbar -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>




@endsection