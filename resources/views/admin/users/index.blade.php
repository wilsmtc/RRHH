@extends('Template.layouts.app')

@section('title','Usuarios')  

@section('title-content','Lista de Usuarios')
@section('main-content')
@section('contentheader_title', 'Usuarios')
@section('Nivel_title', 'Usuarios')
   <!-- Your Page Content Here -->
    @if(Auth::user()->permission->add == 1)
        <div align="right" style="border:auto;">
            <a class="btn btn-info" data-toggle="modal" href='#modal-RUsers'>Nuevo Usuario</a>
        </div>
    @endif
    <hr>
    <div class="table-responsive table-striped">
        <table id="DataTableUser" class="table table-bordered table-striped" width="100%">
            <thead >
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Usuario</th>
                    <th style="text-align: center;">Nombre</th>
                    <th style="text-align: center;">Correo</th>
                    <th style="text-align: center;">Tipo</th>
                    <th style="text-align: center;">Accion</th>
                    
                </tr>
            </thead>
           <tbody style="text-align: center;">

            </tbody>
        </table>
    </div>

    @include('admin.users.create-modal')
    @include('admin.users.modal-edit')
    @include('admin.users.modal-edit-permissions')
    @include('admin.users.modal-confirm-delete')
    @include('admin.users.modal-password')
@endsection
@section('js')
<script type="text/javascript">
    $("#btnRUser").click(function(){
        var registerForm = $("#FRUsers");
        var formData = registerForm.serialize();
        var route = "{{route('users.store')}}";
        $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        type: 'POST',
        dataType: 'json',
        data:formData,
        success: function(data){
            if (data.success == 'true')
            {
                $("#modal-RUsers").modal('toggle');
                window.location = '{{ route('users.index')}}' ;
            } 
        }, 
        error:function(data)
        {
            console.log(data.responseJSON.errors);
            var message="";
            if(data.responseJSON.errors.username != undefined){
                $('#Rusername').css('border', 'solid 1px red');
                message="Los campos Resaltados de color rojo son obligatorios. "+"<br/>";  
            }else{
                $("#Rusername").removeAttr( 'style' );}
            if(data.responseJSON.errors.name != undefined){ 
                $('#Rname').css('border', 'solid 1px red');
                message="Los campos Resaltados de color rojo son obligatorios. "+"<br/>";  
            }else {
                 $('#Rname').removeAttr( 'style' );}
            if(data.responseJSON.errors.lastname != undefined){ 
                $('#Rlastname').css('border', 'solid 1px red'); 
                message="Los campos Resaltados de color rojo son obligatorios. "+"<br/>"; 
            }else {
                $('#Rlastname').removeAttr( 'style' );}
            if(data.responseJSON.errors.email != undefined){ 
                $('#Remail').css('border', 'solid 1px red'); 
                message="Los campos Resaltados de color rojo son obligatorios. "+"<br/>"; 
            }else {
                $('#Remail').removeAttr( 'style' );}
            if(data.responseJSON.errors.password != undefined){ 
                $('#Rpassword').css('border', 'solid 1px red');
                message="Los campos Resaltados de color rojo son obligatorios. "+"<br/>";  
            }else {
                $('#Rpassword').removeAttr( 'style' );}
            if(data.responseJSON.errors.role_id != undefined){ 
                $('#Rrole_id').css('border', 'solid 1px red');
                message="Los campos Resaltados de color rojo son obligatorios. "+"<br/>";  
            }else {
                $('#Rrole_id').removeAttr( 'style' );}
            
            if($("#Rusername").val().length != 0 )
            {
                if(data.responseJSON.errors.username!=undefined){
                message = message +  data.responseJSON.errors.username[0]+ "<br/>";}
            }
            if($("#Remail").val().length != 0 )
            {
                if(data.responseJSON.errors.email!=undefined){
                message =  message + data.responseJSON.errors.email[0];}
            }
            toastr.error(message);   
        }  
        });
    });


    function openmodal(id) {
        var route = "{{url('admin/permissions')}}/"+id+"/edit";
        $.get(route, function(data){
            console.log(data);
        $("#EPTitle-Label").html("Editando Permisos del Usuario:  "+data.username);
        $("#id").val(data.user_id);
        document.getElementById("Eedit").checked = false;
        document.getElementById("Eremove").checked = false;
        document.getElementById("Eadd").checked = false;
        if(data.add==1)
            {document.getElementById("Eadd").checked = true;}
        if(data.edit==1)
            {document.getElementById("Eedit").checked = true;}
        if(data.remove==1)
            {document.getElementById("Eremove").checked = true;}
        });
    };
    $("#btnEPermissions").click(function()
    {
        var id = $("#id").val();
        var add = $("#Eadd").prop('checked');
        var edit = $("#Eedit").prop('checked');
        var remove = $("#Eremove").prop('checked');
        if(!add)
            add=0;
        if(!edit)
            edit=0;
        if(!remove)
            remove=0;
        var route = "{{url('admin/permissions/')}}/"+id+"";
        var token = $("#token").val();
        $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
        data: {add:add,edit:edit,remove:remove},
        success: function(data){
            if (data.success == 'true')
            {
                //console.log(data);
                $("#MeditPermissions").modal('toggle');
                //window.location = '{{ route('users.index')}}' ;
                window.location.replace("users");
            }
        },
        error:function(data)
        {
            console.log(data);
        }  
      });
    });
    function conf_modal(attr){ 
        $('#delete-user').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) 
        var user_id = button.data('userid') 
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #CTitle').html("Esta seguro de eliminar el usuario: "+username);
        //$('#delete-user').on('show.bs.modal', function (event) {
        });
    }
    var Mostrar = function(id)
    {
        var route = "{{url('admin/users')}}/"+id+"/edit";
        $.get(route, function(data){
            $("#Eid").val(data.id);
            $("#Eusername").val(data.username);
            $("#Ename").val(data.name);
            $("#Elastname").val(data.lastname);
            $("#Eemail").val(data.email);
            $("#Epassword").val(data.password);
            $("#Erole_id").val(data.role.id);
            $("#ETitle-Label").html("Editando al Usuario: "+data.username);

        });
    }
    //llena los datos en el modal para Resetear Contraseña
    var Mostrar2 = function(id)
    {
        var route = "{{url('admin/password')}}/"+id+"/edit";
        $.get(route, function(data){
            console.log(data);
            $("#EPid").val(data.id);
            $("#EPaTitle-Label").html("Reiniciando Contraseña de: "+data.username);
        });
    }

    $("#btnEUsers").click(function()
    {
        var id = $("#Eid").val();
        var username = $("#Eusername").val();
        var name = $("#Ename").val();
        var lastname = $("#Elastname").val();
        var email = $("#Eemail").val();
        var password = $("#Epassword").val();
        var role_id = $("#Erole_id").val();
        var route = "{{url('admin/users/')}}/"+id+"";
        var token = $("#token").val();
        $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
        data: {username:username,name: name,lastname:lastname,email:email,password:password,role_id:role_id},
        success: function(data){
            if (data.success == 'true')
            {
                $("#modal-EUsers").modal('toggle');
                window.location = '{{ route('users.index')}}' ;
            }else {
                if(data.error == 'true')
                {
                    limpiarStyle();
                    toastr.error(data.mensaje);
                    if(data.cont == 1)
                    {
                        $('#Eusername').css('border', 'solid 1px red'); 
                    }else {
                        if(data.cont == 2)
                        {
                            $('#Eemail').css('border', 'solid 1px red'); 
                        }else {
                            $('#username').css('border', 'solid 1px red'); 
                            $('#Eemail').css('border', 'solid 1px red'); 
                        }

                    }
                }
            }
        },
        error:function(data)
        {
            var message="Los campos Resaltados de color rojo son obligatorios";
            console.log(data.responseJSON.errors);
            if(data.responseJSON.errors.username){
                $('#Eusername').css('border', 'solid 1px red'); 
            }else{
                $("#Eusername").removeAttr( 'style' );}
            if(data.responseJSON.errors.name){ 
                $('#Ename').css('border', 'solid 1px red'); 
            }else {
                $('#Ename').removeAttr( 'style' );}
            if(data.responseJSON.errors.lastname){ 
                $('#Elastname').css('border', 'solid 1px red'); 
            }else {
                $('#Elastname').removeAttr( 'style' );}
            if(data.responseJSON.errors.email){ 
                $('#Eemail').css('border', 'solid 1px red'); 
            }else {
                $('#Eemail').removeAttr( 'style' );}
            if(data.responseJSON.errors.rol_id){ 
                $('#Erole_id').css('border', 'solid 1px red'); 
            }else {
                $('#Erole_id').removeAttr( 'style' );}
            toastr.error(message);
        }  
      });
    });

    //Edita la contraseña de un usuario
    $("#btnEPassword").click(function()
    {
        var id = $("#EPid").val();
        var password = $("#EPpassword").val();
        var password2 = $("#EVpassword").val();
        var route = "{{url('admin/password/')}}/"+id+"";
        var token = $("#EPtoken").val();
        if(ValidarPassword(password,password2))
        {
            $.ajax({ 
                url: route,
                headers: {'X-CSRF-TOKEN': token},
                type: 'PUT',
                dataType: 'json',
                data: {password:password},
                success: function(data){
                    if (data.success == 'true')
                    {
                        $("#modal-EPassword").modal('toggle');
                        window.location = '{{ route('users.index')}}' ;
                    }
                },
                error:function(data)
                {
                    console.log(data.responseJSON.errors);
                    var message="Los campos Resaltados de color rojo son obligatorios";
                    if(data.responseJSON.errors.password){ 
                        $('#EPpassword').css('border', 'solid 1px red'); 
                        $('#EVpassword').css('border', 'solid 1px red'); 
                    }else {
                        $('#EPpassword').removeAttr( 'style' );
                        $('#EVpassword').removeAttr( 'style' );
                    }
                    toastr.error(message);
                }  
            });        
        }else {
            $('#EPpassword').css('border', 'solid 1px red'); 
            $('#EVpassword').css('border', 'solid 1px red');
            toastr.error("Las contraseñas son diferentes");
        }

    });

    function activar_tabla_users() {
    $('#DataTableUser').DataTable({
        "processing" : true,
        "serverSide" : true,
        "searchDelay" : 500,
        "responsive": {
            orthogonal: 'responsive'
        },
        "language": {
            "url": '{!! asset('/plugins/datatables.net/latino.json') !!}'
        } ,
        "lengthMenu": [5,10, 25, 50, 75 ],
        "ajax":'{!! url('admin/list_user') !!}',
        columns: [
            {data: 'id' },
            {data: 'username'},
            {data: 'usuario_fullname',
                render: function (data, type, row, meta) {
                    return row.name + ' ' + row.lastname;
                } 
            },
            {data: 'email'},
            {data: 'rol_nombre',
                render: function(data, type, row, meta) {
                var html = ''
                if ( row.rol_nombre == 'Administrador' )
                {
                    html = '<span class="label label-danger" > <label style="width:80px;"> '+row.rol_nombre+' </label></span>';
                            
                }else {
                    html = '<span class="label label-primary" > <label style="width:80px;"> '+row.rol_nombre+' </label></span>';
                }
                return html;
                }
            },{
            "defaultContent" : " ",
            "searchable" : false,
            "orderable" : false,
            "render" : function(data, type, row, meta) {
                    var disabled = "", tooltip = 'data-toggle="tooltip"';
                    var html="";
                    if({!!Auth::user()->permission->remove!!} == 1 )
                    {
                        html+= '<span data-toggle="modal" data-target="#delete-user" data-username="'+row.username+'" data-userid="'+row.id+'"><a id="tooltip-ex" class="btn btn-danger btn-xs" onclick="conf_modal(this)" data-original-title="Eliminar" data-toggle="tooltip" data-placement="auto"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></span>';
                    }
                    if({!!Auth::user()->permission->edit!!} == 1 )
                    {
                        html+='&nbsp;<span data-toggle="modal" data-target="#modal-EUsers"><a class="btn btn-warning btn-xs" onclick="Mostrar('+row.id+');" id="#updateUser'+row.id+'" data-original-title="Editar"  data-target="#modal-EUsers" data-toggle="tooltip"><i class="fas fa-wrench"></i></a></span>';

                        html+='&nbsp;<span data-toggle="modal" data-target="#MeditPermissions"><a class="btn btn-info btn-xs" onclick="openmodal('+row.id+')" id="#MeditPermissions'+row.id+'" data-original-title="Editar Permisos" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></span>';

                        html+='&nbsp;<span data-toggle="modal" data-target="#modal-EPassword"><a class="btn btn-success btn-xs" onclick="Mostrar2('+row.id+');" data-original-title="Cambiar Contraseña"  data-target="#modal-EPassword" data-toggle="tooltip"><i class="fas fa-key"></i></a></span>';
                    }
                    return html;
            },
            }],

    });
    }
    activar_tabla_users();
    function limpiarStyle()
    {        
        $("#Eusername").removeAttr( 'style' );
        $("#Ename").removeAttr( 'style' );
        $("#Elastname").removeAttr( 'style' );
        $("#Eemail").removeAttr( 'style' );
        $("#Epassword").removeAttr( 'style' );
        $("#Erole").removeAttr( 'style' );
    }
    
    //Validar Contraseña
    function ValidarPassword(p1,p2)
    {
        if(p1 != p2)
            return false;
        else
            return true;
    }


    
    </script>
@endsection