@extends('Template.layouts.auth')

@section('htmlheader_title')

@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <b>Sistema de Recursos Humanos</b>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> error <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
        
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="login" id="login" name="login" class="form-control" placeholder="Email / Usuario" value="{{ old('login') }}" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>


            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="contraseña" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div><!-- /.col -->
            </div>
        </form>

        
    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>

</body>
    @include('Template.layouts.partials.scripts_auth')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection
