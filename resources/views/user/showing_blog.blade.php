@extends('home.MainPage')

@section('title', 'My Blogs')

@section('bar_title', 'Home')

@section('main')

<div style="margin-top: 9%; background-color:white;" class="card-body">
    <div class="card">
        <h5 class="card-header">Blogs</h5>
        <a href="{{ route('user creating blog', ['user_id' => $user->id]) }}" class='btn btn-primary' style='color:aliceblue;'>Add a new blog</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    @if(isset($data))
                    <thead>
                        <tr>
                            <th style='text-align:center;'>ID</th>
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
                            <td style=' text-align:center;'>{{ $blog->category->title }}</td>
                            <td style=' text-align:center;'>{{ $blog->title }}</td>
                            <td style=' text-align:center;'>{{ $blog->status }}</td>
                            <td>
                                <img style="display: block; margin: auto;" src=" {{ Storage::url($blog->image) }}" height='80' weight='80' alt="">
                            </td>
                            <td>
                                <a href="{{ route('user showing image gallery', ['user_id' => Auth::user()->id, 'id' => $blog->id]) }}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')"> <img style="display: block; margin: auto;" src="{{asset('assets/images')}}/gallery.png" height='60' weight='60' alt="">
                                </a>
                            </td>
                            <td>
                                <div style=' text-align:center;'>
                                    <a href="{{ route('user editing blog', ['user_id' => Auth::user()->id, 'id' => $blog->id]) }}" class='text-primary' style='border:none; font-size:45px;'><i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                            <form action="{{ route('user destroying blog', ['user_id' => Auth::user()->id, 'id' => $blog->id]) }}" method="POST">
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

@endsection