<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('Template.layouts.partials.htmlheader')
@show
<body class="skin-purple sidebar-mini">
    <div class="wrapper">
    @include('Template.layouts.partials.mainheader')
    @include('Template.layouts.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('Template.layouts.partials.contentheader')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid spark-screen">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @yield('title-content')
                            </div>
                            <div class="panel-body">
                                <!-- Your Page Content Here -->
                                @yield('main-content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    @include('Template.layouts.partials.footer')
    <!-- @include('Template.layouts.partials.controlsidebar') -->

    </div><!-- ./wrapper -->
    @include('Template.layouts.partials.scripts')
    @yield('js')
</body>
</html>
