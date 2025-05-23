    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Title Meta -->
        <meta charset="utf-8" />
        <title>{{ $title ?? '' }} | {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex">
        <meta name="theme-color" content="#ffffff">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ getFavicon() }}">

        <!-- Google Font Family link -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">

        <!-- Vendor css -->
        <link href="{{ asset('backend/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Icons css -->
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('backend/css/style.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('common/css/custom.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

        <!-- Theme Config js -->
        <script src="{{ asset('backend/js/config.js') }}"></script>
    </head>

    <body>
        <div class="loading-overlay">
            <div class="loading-spinner"></div>
        </div>
        <!-- START Wrapper -->
        <div class="app-wrapper">
            <!-- Topbar Start -->
            <x-shared.header />
            <!-- Topbar End -->

            <!-- App Menu Start -->
            <x-shared.nav />
            <!-- App Menu End -->

            <div class="page-content">
                <!-- Start Container Fluid -->
                <div class="container-fluid">
                    {{ $slot }}
                </div>
                <!-- End Container Fluid -->

                <!-- Footer Start -->
                <x-shared.footer />
                <!-- Footer End -->
            </div>
        </div>
        <!-- END Wrapper -->
        @include('sweetalert::alert')

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

        <!-- Vendor Javascript -->
        <script src="{{ asset('backend/js/vendor.min.js') }}"></script>

        <!-- App Javascript -->
        <script src="{{ asset('backend/js/app.js') }}"></script>

        {{-- Sweet alert --}}
        <script src="{{ asset('common/plugins/sweet-alert/sweetalert-2.min.js') }}"></script>

        {{-- Cute alert --}}
        {{-- <link href="{{ asset('common/plugins/cute-alert/cute-alert.css') }}" rel="stylesheet">
        <script src="{{ asset('common/plugins/cute-alert/cute-alert.js') }}"></script> --}}

        {{-- Select 2 --}}
        <link href="{{ asset('common/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
        <script src="{{ asset('common/plugins/select2/js/select2.min.js') }}"></script>

        <script src="{{ asset('common/js/http.js') }}"></script>
        <script src="{{ asset('common/js/custom.js') }}"></script>

        <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        {{-- <script>
            let idleTime = 0;
        
            // Increment the idle time counter every minute
            setInterval(() => {
                idleTime++;
                if (idleTime >= 5) { // Lock after 5 minutes of inactivity
                    window.location.href = "{{ route('lock_screen.lock') }}";
                }
            }, 60000);
        
            // Reset idle time on user activity
            document.addEventListener('mousemove', () => idleTime = 0);
            document.addEventListener('keypress', () => idleTime = 0);
        </script> --}}

        @stack('scripts')
        <div id="ajax_modal_container"></div>
    </body>

    </html>
