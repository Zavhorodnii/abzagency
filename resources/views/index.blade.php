<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Icons -->
{{--    <link rel="stylesheet" href="@/plugins/fontawesome-free/css/all.min.css">--}}
    @vite('public/plugins/fontawesome-free/css/all.min.css')
    <!-- overlayScrollbars -->
{{--    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">--}}
    @vite('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')
    <!-- Theme style -->
{{--    <link rel="stylesheet" href="dist/css/adminlte.min.css">--}}
    @vite('public/dist/css/adminlte.min.css')
</head>
{{--<body>--}}
{{--<div id="app">--}}
{{--    <router-view></router-view>--}}
{{--</div>--}}

{{--@vite('resources/js/app.js')--}}

{{--</body>--}}

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper" id="app">
    <router-view></router-view>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
@vite('public/plugins/jquery/jquery.min.js')
<!-- Bootstrap -->
@vite('public/plugins/bootstrap/js/bootstrap.bundle.min.js')
<!-- overlayScrollbars -->
@vite('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')
<!-- AdminLTE App -->
@vite('public/dist/js/adminlte.js')

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
@vite('public/plugins/jquery-mousewheel/jquery.mousewheel.js')
@vite('public/plugins/raphael/raphael.min.js')
@vite('public/plugins/jquery-mapael/jquery.mapael.min.js')
@vite('public/plugins/jquery-mapael/maps/usa_states.min.js')
<!-- ChartJS -->
@vite('public/plugins/chart.js/Chart.min.js')

<!-- AdminLTE for demo purposes -->
{{--@vite('public/dist/js/demo.js')--}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--@vite('public/dist/js/pages/dashboard2.js')--}}

@vite('public/plugins/toastr/toastr.min.css')
@vite('public/plugins/toastr/toastr.min.js')

@vite('resources/js/app.js')

</body>
</html>
