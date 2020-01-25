<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Home')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb" style=" right: 15%; ">
        <li><a href="/Home"><i class="fas fa-tachometer-alt"></i>Home</a></li>
        <li class="active">@yield('Nivel_title', 'Home')</li>
    </ol>
</section>