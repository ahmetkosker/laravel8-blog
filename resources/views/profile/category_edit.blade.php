@extends('profile.admin_main')

@section('title', 'Edit category')

@section('main')


<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header" id="top">
                            <h2 class="pageheader-title">Form Elements </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="page-section" id="overview">
                    <!-- ============================================================== -->
                    <!-- overview  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2>Overview</h2>
                            <p class="lead">Nam pulvinar interdum turpis a mattis. Etiam augue leo, mollis a massa sagittis, egestas pretium risus. Aliquam auctor nibh mauris, at fringilla elit lobortis sodales. Praesent volutpat felis et placerat elementum. </p>
                            <ul class="list-unstyled arrow">
                                <li> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                <li>Mauris bibendum massa ut porttitor congue.</li>
                                <li>Morbi condimentum magna eget facilisis accumsan.</li>
                                <li>Proin euismod eros nec libero efficitur, a dapibus mauris condimentum. </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end overview  -->
                    <!-- ============================================================== -->
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Basic Form Elements</h3>
                            <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Basic Form</h5>
                            <div class="card-body">
                                <form action="" method='POST'>
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="input-select">Parent</label>
                                        <select name='parent' class="form-control" id="input-select">
                                            <option value='0'>Main Category</option>
                                            @if(isset($data))
                                            @foreach ($data as $data)
                                            <option value={{ $data->id  }}>{{ $data->title  }}</option>
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
                                        <select name='status' class="form-control" id="status">
                                            <option value="true">True</option>
                                            <option value="false" selected>False</option>
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

<script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<script src="/assets/libs/js/main-js.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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

@endsection