@extends('admin.admin_main')

@section('title', 'Edit User')

@section('main')


<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Editing user</h5>
                            <div class="card-body">
                                @if($data)
                                <form action="{{ route('admin user update', ['id' => $data->id]) }}" method='POST' enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Name</label>
                                        <input id="name" type="text" name="name" value="{{ $data->name }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input id="email" type="text" name="email" value="{{ $data->email }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">Phone</label>
                                        <input id="phone" type="text" name="phone" value="{{ $data->phone }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-form-label">Address</label>
                                        <input id="address" type="text" name="address" value="{{ $data->address }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input id="email" type="text" name="email" value="{{ $data->email }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Image</label>
                                        <input id="image" type="file" name="image" value="{{ Storage::url($data->profile_photo_path) }}" class="form-control">
                                        @if($data->profile_photo_path)
                                        <img src="{{ Storage::url($data->profile_photo_path) }}" height="60" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="submit" type="submit" class="form-control btn-facebook" value='Submit'>
                                    </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection