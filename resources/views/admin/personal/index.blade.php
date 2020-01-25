@extends('Template.layouts.app')

@section('title','Personal')  

@section('title-content','Lista de Personal')
@section('main-content')
@section('contentheader_title', 'Personal')
@section('Nivel_title', 'Personal')
   <!-- Your Page Content Here -->
    @if(Auth::user()->permission->add == 1)
        <div align="left" style="border:auto;">
            <a class="btn btn-info" data-toggle="modal" onclick="llenarCiudades()" data-target="#modal-Rpersonal">Nuevo Personal</a>
        </div>
    @endif
    <hr>
    <div class="table-responsive table-striped">
        <table id="Tabla-personales" class="table table-bordered table-striped" width="100%">
            <thead >
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Nombre Completo</th>
                    <th style="text-align: center;">Carnet de Identidad</th>
                    <th style="text-align: center;">Celular</th>
                    <th style="text-align: center;">Cargo</th>
                    <th style="text-align: center;">Pertenece a Unidad</th>
                    <th style="text-align: center;">Curriculum</th>
                    <th style="text-align: center;">Accion</th>
                    
                </tr>
            </thead>
           <tbody style="text-align: center;">

            </tbody>
        </table>
    </div>

    @include('admin.personal.create-modal')
    @include('admin.personal.edit-modal')
    @include('admin.personal.documento-modal')

@endsection
@section('js')
<script type="text/javascript">
    //Listar datos del personal
    function activar_tabla_personal() {
    $('#Tabla-personales').DataTable({
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
        "ajax":'{!! url('admin/listar_personal') !!}',
        columns: [
            {data: 'id' },
            {data: 'personal_nombre' },
            {data: 'ci' },
            {data: 'celular' },
            {data: 'cargo' },
            {data: 'nombre_unidad' },
            {data: 'curriculum', 
                render : function(data, type,row)
                {
                    var html = '';
                    if ( row.curriculum == 'NO' )
                    {
                        html = '<span class="label label-danger" > <label style="width:80px;"> No Existe </label></span>';
                                
                    }else {
                        html = '<span class="label label-primary" > <label style="width:80px;"> Existe </label></span>';
                    }
                    return html;
                }
            },
            {
            "defaultContent" : " ",
            "searchable" : false,
            "orderable" : false,
            "render" : function(data, type, row, meta) {
                    var disabled = "", tooltip = 'data-toggle="tooltip"';
                    var html="";
                    if({!!Auth::user()->permission->remove!!} == 1 )
                    {
                        html= '<span data-toggle="modal" "><a id="tooltip-ex" class="btn btn-danger btn-xs" onclick="eliminarPersonal('+row.id+')" data-original-title="Eliminar" data-toggle="tooltip" data-placement="auto"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></span>';
                    }
                    if({!!Auth::user()->permission->edit!!} == 1 )
                    {                    
                        html+='&nbsp;<span data-toggle="modal" data-target="#modal-Epersonal"><a class="btn btn-warning btn-xs" onclick="llenarDatos('+row.id+');" data-original-title="Editar"  data-toggle="tooltip"><i class="fas fa-wrench"></i></a></span>';
                        if (row.curriculum == 'NO')
                        {
                            html+='&nbsp;<span data-toggle="modal" data-target="#modal-RArchivo"><a class="btn btn-info btn-xs" onclick="enviarDoc('+row.id+');" data-original-title="Subir Documento"  data-toggle="tooltip"><i class="fas fa-file-upload"></i></a></span>';
                        }else
                        {
                            html+='&nbsp;<span data-toggle="modal" data-target="#modal-RArchivo"><a class="btn btn-info btn-xs" onclick="enviarDoc('+row.id+');" data-original-title="Actualizar Documento"  data-toggle="tooltip"><i class="fas fa-file-upload"></i></a></span>';

                            html+='&nbsp;<span><a class="btn btn-success btn-xs" href="/admin/download/'+row.id+'"  data-original-title="Descargar Documento"  data-toggle="tooltip"><i class="fas fa-download"></i></a></span>';
                        }
                       
                        

                    } 

                    return html;
            },
        }],
    });
    } 
   //activa la funcion que muestra los datos
    activar_tabla_personal();

    function llenarCiudades()
    {
        //$('#modal-Rpersonal').modal('show');
        var route = "{{url('admin/get_allciudades')}}";
        $.get(route,function(res, sta){
            $("#Plist_ciudades").empty();
            $("#Plist_ciudades").append(`<option value=""> </option>`);
            res.forEach(element => {
                $("#Plist_ciudades").append(`<option value=${element.id}> ${element.nombre} </option>`);
            });
            $("#Plist_ciudades").trigger("chosen:updated");
        });

        var route = "{{url('admin/get_allunidades')}}";
        $.get(route,function(res, sta){
            $("#Plist_unidades").empty();
            $("#Plist_unidades").append(`<option value=""> </option>`);
            res.forEach(element => {
                $("#Plist_unidades").append(`<option value=${element.id}> ${element.nombre} </option>`);
            });
            $("#Plist_unidades").trigger("chosen:updated");
        });
    }
    //Boton para Registrar el Personal
    $("#btnRpersonal").click(function(){
        var ciudad_id = $("#Plist_ciudades").val();
        console.log(ciudad_id);
        var unidad_id = $("#Plist_unidades").val();
        var nombre = $("#RPnombre").val();
        var apellido = $("#RPapellido").val();
        var cargo = $("#RPcargo").val();
        var ci = $("#RPci").val();
        var celular = $("#RPcelular").val();
        var route = "{{route('personal.store')}}";
        var token = $("#RPtoken").val();
        $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data:{nombre:nombre,apellido:apellido,ci:ci,celular:celular,cargo:cargo,unidad_id:unidad_id,ciudad_id:ciudad_id,},
        success: function(data){
            if (data.success == 'true')
            {
                $("#modal-Rpersonal").modal('toggle');
                toastr.success("Personal "+data[0].nombre+" Registrado.");  
                $('#Tabla-personales').DataTable().ajax.reload();
            } 
        },
        error:function(data)
        {
            var message="";           
            toastr.error(message);  
        }  
        });
    });

    //Funcion para Eliminar una Unidad
    function eliminarPersonal(id)
    {
        var route = "{{url('admin/personal/')}}/"+id;
        $.get(route, function(data){
             swal({
              title: "CONFIRMAR",
              text: "Esta seguro de Eliminar el Personal: "+"\n"+ data.nombre,
              buttons: ["Cancelar", "Confirmar"],
            })
            .then((willDelete) => {
              if (willDelete) {
                var route = "{{url('admin/eliminarPersonal')}}";
                $.ajax({
                        url: route,
                        method: 'get',
                        data:{id:data.id},
                        success: function(data) {
                            toastr.success("La Unidad: "+data[0].nombre+" Fue Eliminada");  
                            $('#Tabla-personales').DataTable().ajax.reload();
                           
                        }
                });
              } 
            });            
        })     
    }

    //llena los datos en el modal para Editar una Personal
    function llenarDatos(id)
    {
        //llenardatosEdit();
        var route = "{{url('admin/personal')}}/"+id+"/edit";
        $.get(route, function(data){
            console.log(data);
            $("#EPid").val(data[0].id);
            $("#EPnombre").val(data[0].nombre);
            $("#EPapellido").val(data[0].apellido);
            $("#EPci").val(data[0].ci);
            $("#EPcelular").val(data[0].celular);
            $("#EPcargo").val(data[0].cargo);

            $("#EPlist_ciudades").val(data[0].ciudad_id).trigger("chosen:updated");
            $("#EPlist_unidades").val(data[0].unidad_id).trigger("chosen:updated");
            
            $("#EPTitle-Label").html("Editando el Personal: "+data[0].nombre);
        });
    }

    // function llenardatosEdit()
    // {

    //     var route = "{{url('admin/get_allciudades')}}";
    //     $.get(route,function(res, sta){
    //         $("#EPlist_ciudades").empty();
    //         $("#EPlist_ciudades").append(`<option value=""> </option>`);
    //         res.forEach(element => {
    //             $("#EPlist_ciudades").append(`<option value=${element.id}> ${element.nombre} </option>`);
    //         });
    //         $("#EPlist_ciudades").trigger("chosen:updated");
    //     });

    //     var route = "{{url('admin/get_allunidades')}}";
    //     $.get(route,function(res, sta){
    //         $("#EPlist_unidades").empty();
    //         $("#EPlist_unidades").append(`<option value=""> </option>`);
    //         res.forEach(element => {
    //             $("#EPlist_unidades").append(`<option value=${element.id}> ${element.nombre} </option>`);
    //         });
    //         $("#EPlist_unidades").trigger("chosen:updated");
    //     });
    // }

    $("#btnEpersonal").click(function()
    {
        var id = $("#EPid").val();
        var ciudad_id = $("#EPlist_ciudades").val();
        var unidad_id = $("#EPlist_unidades").val();
        var nombre = $("#EPnombre").val();
        var apellido = $("#EPapellido").val();
        var cargo = $("#EPcargo").val();
        var ci = $("#EPci").val();
        var celular = $("#EPcelular").val();
        var route = "{{url('admin/personal/')}}/"+id+"";
        var token = $("#EPtoken").val();
        $.ajax({ 
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
         data:{nombre:nombre,apellido:apellido,ci:ci,celular:celular,cargo:cargo,unidad_id:unidad_id,ciudad_id:ciudad_id,},
        success: function(data){
            if (data.success)
            {
                $("#modal-Epersonal").modal('toggle');
                toastr.success("La Unidad: "+data[0].nombre+" Fue Editada");  
                $('#Tabla-personales').DataTable().ajax.reload();
            }
        },
        error:function(data)
        {
            var message="";

            toastr.error(message);  
        }  
      });
    });

    $(".select_Pciudad").chosen({
        placeholder_text_single:'Seleccione un departamento ',
        width: '100%',
        max_selected_options: 1,
        no_results_text: 'El Departamento no existe',
        single_backstroke_delete:true,
    });
    $(".select_Punidades").chosen({
        placeholder_text_single:'Seleccione una Unidad ',
        width: '100%',
        max_selected_options: 1,
        no_results_text: 'La Unidad no existe',
        single_backstroke_delete:true,
    });

    function enviarDoc(id)
    {
        $("#RAid").val(id);
    }
    //Boton para verificar el PDF

    $("#btnAVerificar").click(function(){
        var nombre = $("#file_input_A")[0].files[0];
        if(nombre != undefined)
        { 
            $("#btnRArchivo").attr("disabled", false);
            $("#btnAVerificar").attr("disabled", "disabled");
        }else {
            toastr.warning("","Seleccione Un Archivo PDF");
        }
    }); 

    //Activa Modal Para Subir Archivos
    $('#file_input_A').fileinput({
        language: 'es',
        showUpload: false,
        showRemove: true,
        showPreview: true,
        maxFileSize: 10000,
        allowedFileTypes:['pdf'],
        allowedFileExtensions: ['pdf']
    }).on('fileclear', function(event) {
        $("#btnRArchivo").attr("disabled", true);
        $("#btnAVerificar").attr("disabled", false);
    });
</script>
@endsection