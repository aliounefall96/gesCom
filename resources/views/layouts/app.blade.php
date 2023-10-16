<!DOCTYPE html>
<html lang="fr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="shortcut icon" href="storage/images/{{config('app.icon')}}" />
    <meta name="author" content="NiangPro">
    <title>{{config('app.name')}}</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/fullcalendar.min.css">



    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
        @if(!Auth::user())
    <style>
        html,
        body {
            height: 100%;
            background-attachment: fixed;
            background: url('storage/images/bg.svg'), rgb(218, 217, 216);
            background-size: cover;
            background-position: top;
        }
        .ff{
            font-family: Algerian;
        }
        </style>
    @endif

    @yield('css')
    <livewire:styles />
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <div class="wrapper">
        @if(Auth::user())
        @yield('sidebar')

            @include('layouts.navbar')
            @include('layouts.notification')
        @endif

        @if(Auth::user())
            <div class="main-panel">
            <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid"><!--Statistics cards Starts-->
        @endif
            @yield('content')
            {{ $slot }}
        @if(Auth::user())
                </div>
            </div>
            </div>

            @include('layouts.footer')

        </div>
        @endif
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->

    <script src="{{ asset('assets/vendors/js/core/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/prism.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/screenfull.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pace/pace.min.js') }}"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('assets/vendors/js/moment.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}"></script>

    <script src="{{ asset('assets/vendors/js/toastr.min.js') }}"></script>
    <!-- BEGIN CONVEX JS-->
    <script src="{{ asset('assets/js/app-sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/notification-sidebar.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/switchery.min.js') }}"></script>

    <script src="{{ asset('assets/js/switch.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datatable/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-tables/datatable-advanced.js') }}"></script>
    <script src="assets/vendors/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/form-validation.js"></script>
    <script src="assets/vendors/js/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>

    @yield('js')

    <livewire:scripts />
  </body>
</html>

