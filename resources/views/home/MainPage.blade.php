@php
$setting = \App\Http\Controllers\HomeController::getSetting();
$parentCategory = \App\Http\Controllers\HomeController::categoryList();
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name='description' @if(isset($setting->description)) content="{{ $setting->description }} @endif">
    <meta name='keywords' @if(isset($setting->keywords)) content="{{ $setting->keywords }} @endif">
    <meta name='company' @if(isset($setting->company)) content="{{ $setting->company }} @endif">
    <!-- Highway Template https://templatemo.com/tm-520-highway -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{asset('blog')}}/apple-touch-icon.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('blog')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('blog')}}/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{asset('blog')}}/css/fontAwesome.css">
    <link rel="stylesheet" href="{{asset('blog')}}/css/light-box.css">
    <link rel="stylesheet" href="{{asset('blog')}}/css/templatemo-style.css">




</head>

<body style="background-color: #333;">

    <style>
        .dropright:hover .dropdown-menu {
            display: block;
        }
    </style>


    <nav style="z-index: 999; background-color:black;">
        <div class="logo">
            <a style="font-size:smaller;" href="{{ route('home') }}">Home</em></a>
        </div>
        <div class="logo">
            <a style="font-size:smaller;" href="{{ route('aboutus') }}">About Us</em></a>
        </div>
        <div class="logo">
            <a style="font-size:smaller;" href="{{ route('references') }}">References</em></a>
        </div>
        <div class="logo">
            <a style="font-size:smaller;" href="{{ route('fag') }}">Faq</em></a>
        </div>
        <div class="logo">
            <a style="font-size:smaller;" href="{{ route('contact') }}">Contact</em></a>
        </div>
        @auth
        <div class="logo">
        </div>
        <div class="logo">
        </div>
        <div class="logo">
        </div>
        <div class="logo" style="margin-top:15px;">
            <div class="btn-group-vertical">
                <div class="btn-group">
                    <button style="background-color: black; color:white; font-size:20px;" type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        My information
                    </button>
                    <div class="dropdown-menu" style="background-color: black;">
                        <a class="dropdown-item" style="font-size:medium;" href="{{ route('myaccount') }}">My Profile</em></a><br>
                        <a class="dropdown-item" style="font-size:medium;" href="{{ route('mycomments', Auth::user()->id) }}">My Comments</em></a><br>
                        <a class="dropdown-item" style="font-size:medium;" href="{{ route('user showing blog', Auth::user()->id) }}">My Blogs</em></a><br>
                        <a class="dropdown-item" style="font-size:medium;" href="{{ route('user showing messages', Auth::user()->id) }}">My Messages</em></a>
                    </div>
                </div>
            </div>
        </div>

        @endauth
        <div class="menu-icon">
            <span></span>
        </div>
    </nav>

    @yield('main')

    <footer style="margin-top: 50px;">
        <div style="background-color:#333;" class="container-fluid">
            <div class="col-md-12">
                <ul style="text-align:center; list-style-type:none;">
                    @if(isset($setting->company))<li style="color:white; padding-top:10px;"><b>Company:</b> {{ $setting->company }}</li>@endif
                    @if(isset($setting->address))<li style="color:white; padding-top:10px;"><b>Address:</b> {{ $setting->address }}</li>@endif
                    @if(isset($setting->phone))<li style="color:white; padding-top:10px;"><b>Phone:</b> {{ $setting->phone }}</li>@endif
                    @if(isset($setting->fax))<li style="color:white; padding-top:10px;"><b>Fax:</b> {{ $setting->fax }}</li>@endif
                    @if(isset($setting->email))<li style="color:white; padding-top:10px;"><b>Email:</b> {{ $setting->email }}</li>@endif
                </ul>
            </div>
        </div>
        <div style="background-color:#333;" class="container-fluid">
            <div class="col-md-12">
                <p>
                    @if(isset($setting->facebook)) <a target="_blank" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" style='font-size: 35px; margin:15px;' href="{{ $setting->facebook }}"><i class="fab fa-facebook"></i></a> @endif
                    @if(isset($setting->instagram)) <a target="_blank" onmouseover=" this.style.color='purple'" onmouseout=" this.style.color='white'" style='font-size: 35px; margin:15px;' href=" {{ $setting->instagram }}"><i class="fab fa-instagram"></i></a> @endif
                    @if(isset($setting->twitter)) <a target="_blank" onmouseover=" this.style.color='turquoise'" onmouseout=" this.style.color='white'" style='font-size:35px; margin:15px;' href=" {{ $setting->twitter }}"><i class="fab fa-twitter"></i></a> @endif
                    @if(isset($setting->youtube)) <a target="_blank" onmouseover=" this.style.color='red'" onmouseout=" this.style.color='white'" style='font-size: 35px; margin:15px;' href=" {{ $setting->youtube }}"><i class="fab fa-youtube"></i></a> @endif
                </p>
            </div>
        </div>
        <div style="background-color:#333;" class="container-fluid">
            <div class="col-md-12">
                <p>
                    @if(isset($setting->company))Copyright &copy; 2022 {{ $setting->company }}@endif
                </p>
            </div>
        </div>
    </footer>

    <section class="overlay-menu">
        <div class="container">
            <div class="row">
                <div class="main-menu">
                    <ul>
                        @auth
                        <li>
                            <a style='font-size:40px;'>{{ Auth::user()->name }}</a>
                        </li>
                        @endauth
                        @guest
                        <li>
                            <a href="/login">Login</a>
                        </li>
                        <li>
                            <a href="/register">Register</a>
                        </li>
                        @endguest
                        @foreach($parentCategory as $rs)
                        <li>
                            <div class="btn-group dropright">
                                <button style="background-color:transparent; font-size:x-large;" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $rs->title }}
                                </button>
                                <ul style="color:black; font-size:larger; margin-left:100%; margin-top:-30%;" class="dropdown-menu">
                                    <li> <a style="color:black;" href="{{ route('Category Product', $rs->id) }}"><b>{{ $rs->title }}</b></a></li>
                                    @if(count($rs->children))
                                    @include('home.categorytree', ['children' => $rs->children])
                                    @endif
                                </ul>
                            </div>

                        </li>
                        @endforeach
                        @auth
                        @php
                        $userRoles = Auth::user()->roles->pluck('name');
                        @endphp
                        @if($userRoles->contains('admin'))
                        <li>
                            <a href="{{ route('admin_panel') }}">Admin Panel</a>
                        </li>
                        @endif
                        <li>
                            <a href="/delete">Logout</a>
                        </li>
                        @endauth
                    </ul>
                    <p>We create awesome templates for you.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="{{asset('blog')}}/js/vendor/bootstrap.min.js"></script>
    <script src="{{asset('blog')}}/js/plugins.js"></script>
    <script src="{{asset('blog')}}/js/main.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://summernote.org/vendors/summernote/dist/summernote-bs4.min.js"></script>
    <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="/assets/libs/js/main-js.js"></script>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


</body>

</html>