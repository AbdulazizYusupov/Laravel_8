
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Venture</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png" rel="icon') }}">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <h1 class="sitename">Venture</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="active">Home</a></li>
                    <li class="dropdown" data-bs-theme="dark">
                        <button class="btn btn-text-secondary dropdown-toggle" id="dropdownMenuButtonDark"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDark">
                            @foreach ($datas as $data)
                                <li><a class="dropdown-item" href="#blog-posts">{{ $data->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#sorov">So'rovnoma</a></li>
                    <li><a href="#contact">Contact</a></li>
                    @if (Auth::check() == true)
                        <div class="dropdown" data-bs-theme="dark">
                            <button class="btn btn-text-secondary dropdown-toggle" id="dropdownMenuButtonDark"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDark">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                <li><a class="dropdown-item" href="/category">Category manage</a></li>
                                <li><a class="dropdown-item" href="/post">Post manage</a></li>
                                <li><a class="dropdown-item" href="/question">Question manage</a></li>
                                <li><a class="dropdown-item" href="/variant">Variant manage</a></li>
                                <li><a class="dropdown-item" href="/javob">Javob manage</a></li>
                            </ul>
                        </div>
                    @endif
                    @if (Auth::check() == false)
                        <li><a href="/login">Login&Register</a></li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer dark-background">
        <div class="container">
            <h3 class="sitename">Venture</h3>
            <p>So'nggi yangiliklar va tahlillar bilan sizni tanishtiradigan platforma. Eng muhim voqealarni o'z vaqtida
                yetkazamiz.</p>
            <div class="social-links d-flex justify-content-center">
                <a href="https://x.com/"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                <a href="https://www.skype.com/"><i class="bi bi-skype"></i></a>
                <a href="https://www.linkedin.com/"><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                    <span>Copyright</span> <strong class="px-1 sitename">Venture</strong>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
