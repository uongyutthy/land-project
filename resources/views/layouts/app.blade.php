<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Land Lots @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"  href="{{ asset('vendor/datepicker/css/bootstrap.datepicker.css') }}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/the.app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/datatable/datatables.min.css') }}" rel="stylesheet">

    <!-- Languages -->
    <script src="{{ asset('lang/lang.dist.js') }}"></script>

    @stack('css')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    @include('include.header')
    <div class="app-body">
        @include('include.sidebar')
        <main class="main">
            @include('include.top_breadcrumb')
            <div class="container-fluid">
                <div id="ui-view">
                    <div>
                        <div class="animated fadeIn">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('include.footer')


    <!-- Scripts -->
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('vendor/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/pace-progress/js/pace.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/@coreui/coreui/js/coreui.min.js') }}"></script>

    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('vendor/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.toast.js') }}"></script>
    <script src="{{ asset('js/jquery-confirm.js') }}"></script>
    <script src="{{ asset('js/util/util.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-form/jquery.form.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-loading-overlay/loadingoverlay.min.js') }}"></script>
	<script src="{{ asset('vendor/datepicker/js/bootstrap.datepicker.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('vendor/momentjs/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('js/jquery.repeater.js') }}"></script>
    <script src="{{ asset('vendor/datatable/datatables.min.js') }}"></script>
    <script>
        const app = {
            baseUrl: '{{ url('/'.\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()) }}'
        };
        const PUSHER_APP_KEY = "{!! env('PUSHER_APP_KEY') !!}"
    </script>
    <script src="{{ asset('js/the.app.js') }}"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="{{ asset('js/pages/request.js') }}"></script>

    @include('include.handle_js_css')
    @stack('scripts')
</body>
</html>
