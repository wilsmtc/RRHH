<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<div class="script">

<script src="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('plugins/AdminLTE/js/adminlte.js') }}"></script>

<!-- Notificaciones -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script> 

<!--Data Table -->
<script src="{{ asset('plugins/js/datatables.js')}}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!--dropzone -->
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
<!--File Upload -->
<script src="{{ asset('plugins/bootstrap-fileinput/js/plugins/piexif.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-fileinput/js/plugins/sortable.min.js') }}" ></script>
<script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-fileinput/themes/fa/theme.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-fileinput/js/locales/es.js') }}"></script>

<!-- Alertas -->
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>

<!-- Select -->
<script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<!-- moment -->
<script type="text/javascript" src="{{ asset('plugins/moment/js/moment.js') }}"></script>
<!-- Modal -->
<script type="text/javascript" src="{{ asset('plugins/js/modal.js') }}"></script>
<!-- Notificaciones -->
{!! Toastr::message() !!}

<!-- checkbox -->
<script src="{{ asset('plugins/switchery/dist/switchery.js') }}"></script>


<script type="text/javascript" src="{{ asset('plugins/js/icon_move.js') }}"></script>


<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};

$(document).ready(function(){
    $("#tooltip-ex a").tooltip({
        placement : 'top'
    });
});
</script>
</div>