@extends('profile.admin_main')

@section('title', 'Messages')

@section('main')



<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Data Tables</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <h5 class="card-header">Messages</h5>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered first">
                                @if(isset($data))
                                <thead>
                                    <tr>
                                        <th style='text-align:center;'>Name</th>
                                        <th style='text-align:center;'>Email</th>
                                        <th style='text-align:center;'>Phone</th>
                                        <th style='text-align:center;'>Subject</th>
                                        <th style='text-align:center;'>Message</th>
                                        <th style='text-align:center;'>Note</th>
                                        <th style='text-align:center;'>Edit</th>
                                        <th style='text-align:center;'>Delete</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $message)
                                <tbody>
                                    <tr>
                                        <td style=' text-align:center;'>{{ $message->name }}</td>
                                        <td style=' text-align:center;'>{{ $message->email }}</td>
                                        <td style=' text-align:center;'>{{ $message->phone }}</td>
                                        <td style=' text-align:center;'>{{ $message->subject }}</td>
                                        <td style=' text-align:center;'>{{ $message->message }}</td>
                                        <td style=' text-align:center;'>{{ $message->note }}</td>
                                        <td>
                                            <div style=' text-align:center;'>
                                                <a href="{{ route('admin_message_edit', $message->id) }}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')" class='text-primary' style='border:none; font-size:45px;'><i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <form action="{{ route('admin_message_delete', $message->id) }}" method="GET">
                                            @csrf
                                            <td>
                                                <div style=' text-align:center;'>
                                                    <button onclick="return confirm('Are you sure you want to delete this message?')" type='submit' style='border:none; color:red; font-size:45px;'>
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
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
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
</div>

<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<script src="../assets/libs/js/main-js.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
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