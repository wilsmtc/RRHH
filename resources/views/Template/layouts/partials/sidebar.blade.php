<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('images/users/avatar5.png') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->username }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i>online</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="text-align: center; color: white;">
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('Home') }}">
                <i class='fa fa-link'></i> <span>Dasboard</span></a>
            </li>
            <li class="treeview icon-font-users">
                <a href="#">
                    <i class='fa fa-users'></i> 
                    <span>Usuarios</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.index')}}">
                        <i class='fa fa-user-plus'></i> 
                        <span>Gestor De Usuario</span>
                    </a></li>
                </ul>
            </li>
            <li class="treeview icon-font-building">
                <a href="#">
                    <i class="fas fa-building"></i> 
                    <span>Unidades</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('unidades.index')}}">
                        <i class='fa fa-user-plus'></i> 
                        <span>Gestor De Unidades</span>
                    </a></li>
                </ul>
            </li>
            <li class="treeview icon-font-building">
                <a href="#">
                    <i class="fas fa-user-cog"></i>
                    <span>Adm de Personal</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('personal.index')}}">
                        <i class='fa fa-user-plus'></i> 
                        <span>Gestor De Personal</span>
                    </a></li>
                    <li><a href="#">
                        <i class='fa fa-user-plus'></i> 
                        <span>Asignacion De Personal</span>
                    </a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
@section('js')
<script type="text/javascript">

</script>
@endsection