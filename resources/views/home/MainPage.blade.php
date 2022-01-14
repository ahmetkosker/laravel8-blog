@php
$setting = \App\Http\Controllers\HomeController::getSetting()
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name='description' content="{{ $setting->description }}">
    <meta name='keywords' content="{{ $setting->keywords }}">
    <meta name='company' content="{{ $setting->company }}">
    <!-- Highway Template https://templatemo.com/tm-520-highway -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="blog/apple-touch-icon.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="blog/css/bootstrap.min.css">
    <link rel="stylesheet" href="blog/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="blog/css/fontAwesome.css">
    <link rel="stylesheet" href="blog/css/light-box.css">
    <link rel="stylesheet" href="blog/css/templatemo-style.css">


    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <script src="blog/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>


    <nav>
        <div class="logo">
            <a href="{{ route('home') }}">Home</em></a>
        </div>
        <div class="logo">
            <a href="{{ route('aboutus') }}">About Us</em></a>
        </div>
        <div class="logo">
            <a href="{{ route('references') }}">References</em></a>
        </div>
        <div class="logo">
            <a href="{{ route('fag') }}">Faq</em></a>
        </div>
        <div class="logo">
            <a href="{{ route('contact') }}">Contact</em></a>
        </div>
        <div class="menu-icon">
            <span></span>
        </div>
    </nav>

    @yield('main')

    <footer>
        <div style="background-color:#333;" class="container-fluid">
            <div class="col-md-12">
                <ul style="text-align:center; list-style-type:none;">
                    <li style="color:white; padding-top:10px;"><b>Company:</b> {{ $setting->company }}</li>
                    <li style="color:white; padding-top:10px;"><b>Address:</b> {{ $setting->address }}</li>
                    <li style="color:white; padding-top:10px;"><b>Phone:</b> {{ $setting->phone }}</li>
                    <li style="color:white; padding-top:10px;"><b>Fax:</b> {{ $setting->fax }}</li>
                    <li style="color:white; padding-top:10px;"><b>Email:</b> {{ $setting->email }}</li>
                </ul>
            </div>
        </div>
        <div style="background-color:#333;" class="container-fluid">
            <div class="col-md-12">
                <p>
                    @if($setting->facebook != null) <a target="_blank" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" style='font-size: 35px; margin:15px;' href="{{ $setting->facebook }}"><i class="fab fa-facebook"></i></a> @endif
                    @if($setting->instagram != null) <a target="_blank" onmouseover=" this.style.color='purple'" onmouseout=" this.style.color='white'" style='font-size: 35px; margin:15px;' href=" {{ $setting->instagram }}"><i class="fab fa-instagram"></i></a> @endif
                    @if($setting->twitter != null) <a target="_blank" onmouseover=" this.style.color='turquoise'" onmouseout=" this.style.color='white'" style='font-size:35px; margin:15px;' href=" {{ $setting->twitter }}"><i class="fab fa-twitter"></i></a> @endif
                    @if($setting->youtube != null) <a target="_blank" onmouseover=" this.style.color='red'" onmouseout=" this.style.color='white'" style='font-size: 35px; margin:15px;' href=" {{ $setting->youtube }}"><i class="fab fa-youtube"></i></a> @endif
                </p>
            </div>
        </div>
        <div style="background-color:#333;" class="container-fluid">
            <div class="col-md-12">
                <p>
                    Copyright &copy; 2022 {{ $setting->company }}
                </p>
            </div>
        </div>
    </footer>


    <!-- Modal button -->
    <div class="popup-icon">
        <button id="modBtn" class="modal-btn"><img src="blog/img/contact-icon.png" alt=""></button>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="header-title">Say hello to <em>Highway</em></h3>
                <div class="close-btn"><img src="blog/img/close_contact.png" alt=""></div>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="col-md-6 col-md-offset-3">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="overlay-menu">
        <div class="container">
            <div class="row">
                <div class="main-menu">
                    <ul>
                        @auth
                        <li>
                            <a style='font-size:40px;'>{{ Auth::user()->name }}</a>
                        </li>
                        <li>
                            <a href="{{ route('myaccount') }}">My Profile</a>
                        </li>
                        <li>
                            <a href="">Saved</a>
                        </li>
                        <li>
                            <a href="">Post You Have Liked</a>
                        </li>
                        <li>
                            <a href="">Contact</a>
                        </li>
                        <li>
                            <a href="/delete">Logout</a>
                        </li>
                        @endauth
                        @guest
                        <li>
                            <a href="{{ route('admin_login') }}">Admin Login</a>
                        </li>
                        @endguest

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

    <script src="blog/js/vendor/bootstrap.min.js"></script>

    <script src="blog/js/plugins.js"></script>
    <script src="blog/js/main.js"></script>


</body>

</html>