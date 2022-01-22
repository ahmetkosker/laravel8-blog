@extends('admin.admin_main')

@section('title', 'Users')

@section('main')


<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Users</h5>
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                @if($data)
                                <thead>
                                    <tr>
                                        <th style='text-align:center;'>ID</th>
                                        <th style='text-align:center;'>Photo</th>
                                        <th style='text-align:center;'>Name</th>
                                        <th style='text-align:center;'>Email</th>
                                        <th style='text-align:center;'>Phone</th>
                                        <th style='text-align:center;'>Address</th>
                                        <th style='text-align:center;'>Roles</th>
                                        <th style='text-align:center;'>Edit</th>
                                        <th style='text-align:center;'>Delete</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $user)
                                <tbody>
                                    <tr>
                                        <td style=' text-align:center;'>{{ $user->id }}</td>
                                        <td style=' text-align:center;'>
                                            <img src="{{ Storage::url($user->profile_photo_path) }}" height="60" alt="">
                                        </td>
                                        <td style=' text-align:center;'>{{ $user->name }}</td>
                                        <td style=' text-align:center;'>{{ $user->email }}</td>
                                        <td style=' text-align:center;'>{{ $user->phone }}</td>
                                        <td style=' text-align:center;'>{{ $user->address }}</td>
                                        <td style=' text-align:center;'>
                                            <a href="{{ route('admin user roles', ['id' => $user->id]) }}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')">
                                                @foreach($user->roles as $roles)
                                                {{ $roles->name }}
                                                @endforeach
                                                <i style="color:turquoise;" class="fas fa-plus-circle">
                                                </i>
                                            </a>
                                        </td>
                                        <td>
                                            <div style=' text-align:center;'>
                                                <a href="{{ route('admin user edit', ['id' => $user->id]) }}" class='text-primary' style='border:none; font-size:45px;'><i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <form action="{{ route('admin user delete', ['id' => $user->id]) }}" method="POST">
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
                                <h2><b>There are no user</b></h2>
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