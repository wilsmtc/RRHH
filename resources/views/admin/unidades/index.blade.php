@extends('Template.layouts.app')

@section('title','Unidades')  

@section('title-content','Lista de Unidades')
@section('main-content')
@section('contentheader_title', 'Unidades')
@section('Nivel_title', 'Unidades')
   <!-- Your Page Content Here -->
    @if(Auth::user()->permission->add == 1)
        <div align="left" style="border:auto;">
            <a class="btn btn-info" data-toggle="modal" href='#modal-Runidad'>Nueva Unidad</a>
        </div>
    @endif
    <hr>
    <div class="table-responsive table-striped">
        <table id="Tabla-unidades" class="table table-bordered table-striped" width="100%">
            <thead >
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Nombre</th>
                    <th style="text-align: center;">Descripcion</th>
                    <th style="text-align: center;">Sigla</th>
                    <th style="text-align: center;">Accion</th>
                    
                </tr>
            </thead>
           <tbody style="text-align: center;">

            </tbody>
        </table>
    </div>

    @include('admin.unidades.create-modal')
    @include('admin.unidades.edit-modal')

@endsection
@section('js')
<script type="text/javascript">
    //Listar datos de las unidades
    function activar_tabla_unidades() {
    $('#Tabla-unidades').DataTable({
        "processing"  : true,
        "serverSide"  : true,
        "searchDelay" : 500 ,
        "lengthMenu": [5,10, 25, 50, 75 ],
        "responsive"  : {
            orthogonal: 'responsive'
        },
        "language": {
        "url": '{!! asset('/plugins/datatables.net/latino.json') !!}',
        },
        "ajax":'{!! url('admin/listar_unidades') !!}',
        columns: [
            {data: 'id' },
            {data: 'nombre' },
            {data: 'descripcion' },
            {data: 'sigla' },
            {
            "defaultContent" : " ",
            "searchable" : false,
            "orderable" : false,
            "render" : function(data, type, row, meta) {
                    var disabled = "", tooltip = 'data-toggle="tooltip"';
                    var html="";
                    if({!!Auth::user()->permission->remove!!} == 1 )
                    {
                        html= '<span data-toggle="modal" "><a id="tooltip-ex" class="btn btn-danger btn-xs" onclick="eliminarUnidad('+row.id+')" data-original-title="Eliminar" data-toggle="tooltip" data-placement="auto"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></span>';
                    }
                    if({!!Auth::user()->permission->edit!!} == 1 )
                    {                    
                        html+='&nbsp;<span data-toggle="modal" data-target="#modal-Eunidad"><a class="btn btn-warning btn-xs" onclick="llenarDatos('+row.id+');" data-original-title="Editar"  data-toggle="tooltip"><i class="fas fa-wrench"></i></a></span>';
                    } 

                    return html;
            },
        }],
    });
   } 
   //activa la funcion que muestra los datos
   activar_tabla_unidades();
    //Boton para registrar una nuava unidad
    $('#btnRNunidad').click(function(){
        var nombre = $('#RUnombre').val();
        var sigla = $('#RUsigla').val();
        var descripcion = $('#RUdescripcion').val();
        var token = $("#RUtoken").val();
        var route = "{{route('unidades.store')}}";
        $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data:{nombre:nombre,sigla:sigla,descripcion:descripcion},
        success: function(data){
            $("#modal-Runidad").modal('toggle');
            toastr.success("Unidad Registrada"); 
            $('#Tabla-unidades').DataTable().ajax.reload();
        },
        }); 

    });
    //Funcion para Eliminar una Unidad
    function eliminarUnidad(id)
    {
        var route = "{{url('admin/unidades/')}}/"+id;
        $.get(route, function(data){
             swal({
              title: "CONFIRMAR",
              text: "Esta seguro de Eliminar la Unidad: "+"\n"+ data.nombre,
              buttons: ["Cancelar", "Confirmar"],
            })
            .then((willDelete) => {
              if (willDelete) {
                var route = "{{url('admin/eliminarUnidad')}}";
                $.ajax({
                        url: route,
                        method: 'get',
                        data:{id:data.id},
                        success: function(data) {
                            toastr.success("La Unidad: "+data[0].nombre+" Fue Eliminada");  
                            $('#Tabla-unidades').DataTable().ajax.reload();
                           
                        }
                });
              } 
            });            
        })     
    }

    //llena los datos en el modal para Editar una Unidad
    function llenarDatos(id)
    {
        var route = "{{url('admin/unidades')}}/"+id+"/edit";
        $.get(route, function(data){
            $("#EUid").val(data.id);
            $("#EUnombre").val(data.nombre);
            $("#EUsigla").val(data.sigla);
            $("#EUdescripcion").val(data.descripcion);
            $("#EUTitle-Label").html("Editando la Oficina: "+data.nombre);
        });
    }

    //Actualiza la informacion de una Unidad
    $("#btnENunidad").click(function()
    {
        var id = $("#EUid").val();
        var nombre = $("#EUnombre").val();
        var descripcion = $("#EUdescripcion").val();
        var sigla = $("#EUsigla").val();
        sigla = sigla.replace(/ /g, "").toUpperCase();
        var route = "{{url('admin/unidades/')}}/"+id+"";
        var token = $("#EUtoken").val();
        $.ajax({ 
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
        data: {nombre:nombre,descripcion:descripcion,sigla:sigla},
        success: function(data){
            if (data.success)
            {
                $("#modal-Eunidad").modal('toggle');
                toastr.success("La Unidad: "+data[0].nombre+" Fue Editada");  
                $('#Tabla-unidades').DataTable().ajax.reload();
            }else {
                if(data.error)
                {    
                    $('#EOnombre').css('border', 'solid 1px red');
                    toastr.error(data.mensaje);
                }
            }
        },
        error:function(data)
        {
            var message="";

            toastr.error(message);  
        }  
      });
    });
</script>
@endsection