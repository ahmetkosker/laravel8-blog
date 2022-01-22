@extends('home.MainPage')

@section('title', 'My Images')

@section('bar_title', 'Home')

@section('main')

<div style="margin-top: 9%; padding:25px; background-color:white;" class="card-body">
    <div class="card">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Adding Image</h3>
        </div>
        <div class="card">
            @foreach ($data as $blog)
            <h5 class="card-header">{{ $blog->title }}</h5>
            @endforeach
            <div id="writing" style='display:block;' class="card-body ">
                @foreach ($data as $blog)
                <form action="{{ route('user adding a new image', ['user_id' => Auth::user()->id, 'id' => $blog->id]) }}" method='POST' enctype='multipart/form-data'>
                    @endforeach
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
                                <form action="{{ route('user destroying image', ['user_id' => Auth::user()->id, 'blog_id' => $blog->id, 'image_id' => $image->id]) }}" method="POST">
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

@endsection