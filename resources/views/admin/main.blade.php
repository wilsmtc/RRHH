@extends('Template.layouts.app')

@section('title','Panel Administrador')

@section('title-content','Panel Administrador')
@section('main-content')
@section('contentheader_title', 'Panel Administrador')
@section('Nivel_title', 'Panel Administrador')

@endsection
<input type="hidden" name="_token" id="Hometoken" value="{{ csrf_token() }}">


@section('js')

<script type="text/javascript">
    


</script>

@endsection