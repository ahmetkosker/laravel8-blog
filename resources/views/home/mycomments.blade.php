@extends('home.MainPage')

@section('title', 'My Comments')

@section('bar_title', 'Home')

@section('main')

<div style="margin-top: 9%; background-color:white;" class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered first">
            <h1>My Comments</h1>
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(isset($data))
            <thead>
                <tr>
                    <th style='text-align:center;'>ID</th>
                    <th style='text-align:center;'>Blog Title</th>
                    <th style='text-align:center;'>Comment</th>
                    <th style='text-align:center;'>Rate</th>
                    <th style='text-align:center;'>Status</th>
                    <th style='text-align:center;'>Created At</th>
                    <th style='text-align:center;'>Edit</th>
                    <th style='text-align:center;'>Delete</th>
                </tr>
            </thead>
            @foreach ($data as $data)
            <tbody>
                <tr>
                    <td style=' text-align:center;'>{{ $data->id }}</td>
                    <td style=' text-align:center;'>{{ $data->blog->title }}</td>
                    <td style=' text-align:center;'>{{ $data->comment }}</td>
                    <td style=' text-align:center;'>{{ $data->rate }}</td>
                    <td style=' text-align:center;'>{{ $data->status }}</td>
                    <td style=' text-align:center;'>{{ $data->created_at }}</td>
                    <td>
                        <div style='text-align:center;'>
                            <a href="{{ route('mycomments_edit', ['user_id' => Auth::user()->id, 'id' => $data->id]) }}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')"" class='text-primary' style='border:none; font-size:45px;'><i class=" fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                    <form action="{{ route('mycomments_delete', ['user_id' => Auth::user()->id, 'id' => $data->id]) }}" method="POST">
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
            <h2><b>There are no comment</b></h2>
            @endif
        </table>
    </div>
</div>

@endsection