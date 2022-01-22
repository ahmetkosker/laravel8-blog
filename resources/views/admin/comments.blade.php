@extends('admin.admin_main')

@section('title', 'Comments')

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
                    <h5 class="card-header">Comments</h5>
                    <div class="card-body">
                        @if(session()->has('comment'))
                        <div class="alert alert-success">
                            {{ session()->get('comment') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                @if(isset($data))
                                <thead>
                                    <tr>
                                        <th style='text-align:center;'>ID</th>
                                        <th style='text-align:center;'>Comment</th>
                                        <th style='text-align:center;'>Rate</th>
                                        <th style='text-align:center;'>Blog Title</th>
                                        <th style='text-align:center;'>User Name</th>
                                        <th style='text-align:center;'>Status</th>
                                        <th style='text-align:center;'>Edit</th>
                                        <th style='text-align:center;'>Delete</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $comment)
                                <tbody>
                                    <tr>
                                        <td style=' text-align:center;'>{{ $comment->id }}</td>
                                        <td style=' text-align:center;'>{{ $comment->comment }}</td>
                                        <td style=' text-align:center;'>{{ $comment->rate }}</td>
                                        <td style=' text-align:center;'>{{ $comment->blog->title }}</td>
                                        <td style=' text-align:center;'>{{ $comment->user->name }}</td>
                                        <td style=' text-align:center;'>{{ $comment->status }}</td>
                                        <td>
                                            <div style=' text-align:center;'>
                                                <a href="{{ route('editing comment', $comment->id) }}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')" class='text-primary' style='border:none; font-size:45px;'><i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <form action="{{ route('destroying comment', $comment->id) }}" method="POST">
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
                                <h2><b>There are no comments</b></h2>
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
<!-- </textarea id="summernote" class='form-group'></textarea>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script> -->