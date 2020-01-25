<!-- Modal Usuario-->
	<div class="modal fade" id="modal-RUsers">
		<div class="modal-dialog">
			{!! Form::open(['id'=> 'FRUsers']) !!}
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-header bg-primary" style="border-radius: 0.4rem 0.4rem 0 0">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center ">Formulario - Nuevo Usuario</h4>
				</div>
				<div class="modal-body">
					<div id="message-error" class="alert bg-red" role='alert' style="display: none">
						<strong id="error"></strong>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
						{!! Form::label('username','Usuario') !!}
						{!! Form::text(
							'username',null,
							['class'=>'form-control',
							'placeholder' =>'Nombre del Usuario',
							'id'=>'Rusername']) !!}
						    <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
						</div>
						<div class="col-xs-6">
						{!! Form::label('name','Nombre') !!}
						{!! Form::text(
							'name',null,
							['class'=>'form-control',
							'placeholder' =>'Nombres',
							'id'=>'Rname']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
						{!! Form::label('lastname','Apellidos') !!}
						{!! Form::text(
							'lastname',null,
							['class'=>'form-control',
							'placeholder' =>'Apellidos',
							'id'=>'Rlastname']) !!}
						</div>							
						<div class="col-xs-6">
						{!! Form::label('email','Correo Electronico') !!}
						{!! Form::email(
							'email',null,
							['class'=>'form-control',
							'placeholder' =>'Example@gmail.com',
							'id'=>'Remail']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
						{!! Form::label('password','Contraseña') !!}
						{!! Form::password(
							'password', 
							['class'=>'form-control',
							'placeholder' =>'*********',
							'id'=>'Rpassword']) !!}
						</div>
						<div class="col-xs-6">
						{!! Form::label('type','Tipo') !!}
						{!! Form::select(
							'role_id',$roles,
							null,
							['class'=>'form-control',
							'placeholder'=>'Seleccione una Opcion...',
							'id'=>'Rrole_id']) !!}
						</div>						
					</div>
					<div  class="form-group" align="center"> 
						<div class="col-xs-12">
						{!! Form::label('permission','Permisos') !!}
						</div>
						<label id="Cadd" class="checkbox-inline">
							{!! Form::checkbox('add', null,false ,['id'=>'Radd']) !!} 
							Agregar
						</label>
						<label id="Cedit" class="checkbox-inline">
							{!! Form::checkbox('edit', null,false ,['id'=>'Redit']) !!}
							Editar
						</label>
						<label id="Cremove" class="checkbox-inline">
							{!! Form::checkbox('remove', null,false ,['id'=>'Rremove']) !!}
							Eliminar  
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					{!!link_to('#', $title='Registrar', $attributes = ['id'=>'btnRUser', 'class'=>'btn btn-primary'])!!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
