<head>
    <meta charset="UTF-8">
    <title> 
        @yield('title','Home') | SIS - RE - HU
    </title>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/AdminLTE/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/adminLTE/skins/_all-skins.min.css') }}">
    <link href="{{ asset('plugins/fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/bootstrap/css/bootstrap-theme.css') }}" rel="stylesheet" type="text/css" />

    <!-- END AdminLTE -->
    <!--Data Table -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!--Notificaciones -->
    <link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Mis Css -->
    <link href="{{ asset('plugins/css/modal-activo.css') }}" rel="stylesheet" type="text/css" />
    <!--Dropzone -->
    <link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <!-- File Upload  -->
    <link href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!-- Alert --->
   
    <!-- Select  -->
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
    <!-- Checkbox -->
    <link rel="stylesheet" href="{{asset('plugins/switchery/dist/switchery.css')}}" />

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

    </script>
    
</head>
