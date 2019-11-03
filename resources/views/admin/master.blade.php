<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('/public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/public/admin/bower_components/Ionicons/css/ionicons.min.css')}}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/public/admin/bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{asset('/public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="{{asset('/public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">


    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/public/admin/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/public/admin/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('/public/admin/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('/public/admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- toaster css -->
    <link rel="stylesheet" href="{{asset('/public/admin/bower_components/toasterjs/toastr.css') }}">


    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{asset('/public/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('/public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{asset('/public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script>
        /*
            Register the base URL
         */

        var base_url = "<?php echo URL::to('/')?>";

    </script>

</head>
<body class="sidebar-mini skin-purple-light">
<div class="wrapper">
    @include('admin.common.header')
    @include('admin.common.sidebar')
    @yield('content')
    @include('admin.common.footer')

</div>


<!-- jQuery 3 -->
<script src="{{asset('/public/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{asset('/public/admin/bower_components/jquery/dist/jquery.validate.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/public/admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Axios  -->
<script src="{{asset('/public/admin/bower_components/axios/axios.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('/public/admin/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/public/admin/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{'/public/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'}}"></script>
<!-- jvectormap -->
<script src="{{asset('/public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/public/admin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- jQuery Chart JS -->
<script src="{{asset('/public/admin/bower_components/chart.js/Chart.bundle.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('/public/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('/public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script
    src="{{asset('/public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('/public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/public/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- bootstrap color picker -->
<script
    src="{{asset('/public/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>


<!-- Select2 -->
<script src="{{asset('/public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('/public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


<!-- Toaster JS -->
<script src="{{asset('/public/admin/bower_components/toasterjs/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/public/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->

<script>


    // Datepicker settings
    $(".datepicker").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    $(function () {


        /*
            Select 2
        */

        $('.select2').select2({
            width: '100%'
        });


        // Delete modal popup form
        $('table[data-form="deleteForm"]').on('click', '.form-delete', function (e) {
            e.preventDefault();
            var $form = $(this);
            $('#confirm').modal({backdrop: 'static', keyboard: false})
                .on('click', '#delete-btn', function () {
                    $form.submit();
                });
        });

        /**
         * Set auto complete off throughout the entire system.
         */
        $(':text').prop('autocomplete', 'off');

        /**
         * Datatable Global configuration
         */

        $('.datatable').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true
        });


        // Toastr settings

        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };


            @if(Session::has('message'))
        var type = "{{ Session::get('alertType', 'info') }}";
        switch (type) {
            case 'info':
                toastr["info"]("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr["warning"]("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr["success"]("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr["error"]("{{ Session::get('message') }}");
                break;
        }
        @endif



    });


</script>


@yield('script')
</body>
</html>
