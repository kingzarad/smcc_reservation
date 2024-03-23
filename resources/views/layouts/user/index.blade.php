<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMCC') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/smcc-logo.png') }}">
    <meta name="theme-color" content="#120d4f">
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets_users/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_users/css/vendors/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_users/css/vendors/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_users/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_users/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_users/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_users/css/vendors/slick/slick-theme.css') }}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets_users/css/demo4.css') }}">
    <style>
        .h-logo {
            max-width: 50px !important;
        }

        footer {
            background: #fff !important;
        }

        .f-logo {
            max-width: 126px !important;
        }

        @media only screen and (max-width: 600px) {
            .h-logo {
                width: 50px !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets_users/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_users/css/custom.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .poster-section {
            height: 600px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.1 ), rgba(0, 0, 0, 0.2)), url('{{ asset('assets/images/smcc-bg.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
    </style>
    @livewireStyles
</head>

<body class="theme-color4 light ltr">
    <style>
        header .profile-dropdown ul li {
            display: block;
            padding: 5px 20px;
            border-bottom: 1px solid #ddd;
            line-height: 35px;
        }

        header .profile-dropdown ul li:last-child {
            border-color: #fff;
        }

        header .profile-dropdown ul {
            padding: 10px 0;
            min-width: 250px;
        }

        .name-usr {
            background: #ffc414;
            padding: 8px 12px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 24px;
        }

        .name-usr span {
            margin-right: 10px;
        }

        .cart-media a {
            color: #fff !important;
        }

        @media (max-width:600px) {
            .h-logo {
                max-width: 150px !important;
            }

            i.sidebar-bar {
                font-size: 22px;
            }

            .mobile-menu ul li a svg {
                width: 20px;
                height: 20px;
            }

            .mobile-menu ul li a span {
                margin-top: 0px;
                font-size: 12px;
            }

            .name-usr {
                padding: 5px 12px;
            }
        }
    </style>
    @include('layouts.user.navbar')

    @yield('content')

    @include('layouts.user.footer')


    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <div class="bg-overlay"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

    <script src="{{ asset('assets_users/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets_users/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_users/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('assets_users/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('assets_users/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets_users/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('assets_users/js/slick/custom_slick.js') }}"></script>
    <script src="{{ asset('assets_users/js/price-filter.js') }}"></script>
    <script src="{{ asset('assets_users/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets_users/js/filter.js') }}"></script>
    <script src="{{ asset('assets_users/js/newsletter.js') }}"></script>
    <script src="{{ asset('assets_users/js/cart_modal_resize.js') }}"></script>
    <script src="{{ asset('assets_users/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets_users/js/theme-setting.js') }}"></script>
    <script src="{{ asset('assets_users/js/script.js') }}"></script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>
    @livewireScripts
</body>

</html>
