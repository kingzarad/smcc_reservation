<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMCC') }}</title>

    <!-- Fonts -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/smcc-logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets_admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/5b408a851a.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets_admin/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link
        href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css">

    <link id="pagestyle" href="{{ asset('assets_admin/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <link href="{{ asset('assets_admin/css/app.css') }}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .background-1 {

            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.2)), url('{{ asset('assets/images/smcc-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .dropdown-toggle::after {
            display: none !important;
        }

        .dropdown-toggle i {
            font-weight: bold !important;
        }

        .image-container {
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            /* This creates a square aspect ratio */
            position: relative;
            overflow: hidden;
        }

        .image-container img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the image covers the container without stretching */
        }
    </style>
    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="g-sidenav-show  bg-gray-100">
    <!-- sidebar page -->
    @include('layouts.admin.sidebar')
    <!-- content page -->
    <main class="main-content position-relative max-height-vh-100 h-100 ">
        <!-- header page -->
        @include('layouts.admin.navbar')
        <div class=" container-fluid py-4 background-1">
            @yield('content')
        </div>
        <!-- footer page -->
        @include('layouts.admin.footer')
    </main>
    <!-- footer page -->
    <!--   Core JS Files   -->
    <!-- include the script -->

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/he.min.js"></script>

    <script src="{{ asset('assets_admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    <script src="{{ asset('assets_admin/js/plugins/chartjs.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="{{ asset('assets_admin/js/datatable/table.js') }}"></script>
    {{-- <script src="{{ asset('assets_admin/js/app.js') }}"></script> --}}
    <script>
        function alertSwift(icon, position, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: position,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: icon,
                title: title
            })
        }

        document.addEventListener('livewire:init', () => {

            Livewire.on('closeModal', (event) => {
                loadScript('{{ asset('assets_admin/js/datatable/table.js') }}');
            });

            Livewire.on('editModal', (event) => {
                loadScript('{{ asset('assets_admin/js/datatable/table.js') }}');
            });

            Livewire.on('saveModal', (event) => {
                loadScript('{{ asset('assets_admin/js/datatable/table.js') }}', function() {
                    if (event.status == 'success') {
                        alertSwift(event.status, event.position, event.message);
                    }
                    if (event.status == 'warning') {
                        alertSwift(event.status, event.position, event.message);
                    }
                });
            });

            Livewire.on('destroyModal', (event) => {
                loadScript('{{ asset('assets_admin/js/datatable/table.js') }}', function() {
                    alertSwift(event.status, event.position, event.message);

                    $(event.modal).modal('hide');
                });
            });

            Livewire.on('updateModal', (event) => {
                loadScript('{{ asset('assets_admin/js/datatable/table.js') }}', function() {
                    alertSwift(event.status, event.position, event.message);
                });
            });

            Livewire.on('messageModal', (event) => {
                loadScript('{{ asset('assets_admin/js/datatable/table.js') }}', function() {
                    alertSwift(event.status, event.position, event.message);
                });
            });

            function loadScript(url, callback) {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = url;

                script.onload = function() {
                    if (callback) callback();
                };
                document.body.appendChild(script);
            }


        });
    </script>
</body>

</html>
