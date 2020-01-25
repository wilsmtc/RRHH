<!-- Modal Usuario-->
  <div class="modal fade" id="modal-EUsers">
    <div class="modal-dialog">
      {!! Form::open([ 'id'=> 'Eform','autocomplete'=>'off']) !!}
      <div class="modal-content">
        <div id="abc" class="modal-header bg-primary" style="border-radius: 0.4rem 0.4rem 0 0">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title text-center" id="ETitle-Label"></h4> 
        </div>
        <div class="modal-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="Etoken">
        <input type="hidden" id="Eid">
        <div class="row">
          <div class="form-group">
            <div class="col-xs-6">
            {!! Form::label('username','Usuario') !!}
            {!! Form::text(
              'username',null,
              ['class'=>'form-control',
              'placeholder' =>'Nombre del Usuario',
              'required','id'=>'Eusername']) !!}
            </div>
            <div class="col-xs-6">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text(
              'name',null,
              ['class'=>'form-control',
              'placeholder' =>'Nombres',
              'required','id'=>'Ename']) !!}
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-6">
            {!! Form::label('lastname','Apellidos') !!}
            {!! Form::text(
              'lastname',null,
              ['class'=>'form-control',
              'placeholder' =>'Apellidos',
              'required','id'=>'Elastname']) !!}
            </div>
            <div class="col-xs-6">
            {!! Form::label('email','Correo Electronico') !!}
            {!! Form::email(
              'email',null,
              ['class'=>'form-control',
              'placeholder' =>'Example@gmail.com',
              'required','id'=>'Eemail']) !!}
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-6">
            {!! Form::label('role_id','Tipo') !!}
            {!! Form::select(
              'role_id',$roles,
             null,
              ['class'=>'form-control',
              'placeholder'=>'Seleccione una Opcion...',
              'required','id'=>'Erole_id']) !!}
            </div>
          </div>  
        </div>
        </div>
           {!! Form::close() !!}
        <div class="modal-footer">
          <div class="form-group">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          {!!link_to('#', $title='Actualizar', $attributes = ['id'=>'btnEUsers', 'class'=>'btn btn-primary'])!!}
          </div>
        </div>
      </div>
   
    </div>
  </div>

