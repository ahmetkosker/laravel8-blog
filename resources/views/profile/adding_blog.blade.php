@extends('profile.admin_main')

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
                                        <select name='category_id' class="form-control" id="input-select">
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
                                    <div class="form-group">
                                        <label for="title" class="col-form-label">Title</label>
                                        <input id="title" type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords" class="col-form-label">Keywords</label>
                                        <input id="keywords" type="text" name="keywords" class="form-control">
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
                                        <select name='status' class="form-control" id="status">
                                            <option value="true">True</option>
                                            <option value="false" selected>False</option>
                                        </select>
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