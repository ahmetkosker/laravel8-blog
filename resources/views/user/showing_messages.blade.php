@extends('home.MainPage')

@section('title', 'My Messages')

@section('bar_title', 'Home')

@section('main')

<div style="margin-top: 9%; background-color:white;" class="card-body">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
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
                            <form action="{{ route('user destroying message', ['user_id' => Auth::user()->id, 'id' => $message->id]) }}" method="GET">
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
@endsection