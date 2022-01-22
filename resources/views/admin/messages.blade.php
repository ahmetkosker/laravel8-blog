@extends('admin.admin_main')

@section('title', 'Messages')

@section('main')



<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
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
                                        <th style='text-align:center;'>Status</th>
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
                                        <td style=' text-align:center;'>{{ $message->status }}</td>
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
                                <h2><b>There are no messages</b></h2>
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