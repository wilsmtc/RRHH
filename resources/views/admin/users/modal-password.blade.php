<!-- Modal Editar Password Usuario-->
<div class="modal fade" id="modal-EPassword">
    <div class="modal-dialog">
      {!! Form::open([ 'id'=> 'Eform','autocomplete'=>'off']) !!}
        <div class="modal-content">
            <div id="abc" class="modal-header bg-primary" style="border-radius: 0.4rem 0.4rem 0 0">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title text-center" id="EPaTitle-Label"></h4>  
            </div>
          <div class="modal-body">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" id="EPtoken">
              <input type="hidden" id="EPid">
              <div class="form-group">
                <div class="col-xs-6">
                  {!! Form::label('password','Contraseña') !!}
                  {!! Form::password(
                    'password',
                    ['class'=>'form-control',
                    'placeholder' =>'*********',
                    'id'=>'EPpassword']) !!}
                </div>
                <div class="col-xs-6">
                  {!! Form::label('password','Verificar Contraseña') !!}
                  {!! Form::password(
                    'password',
                    ['class'=>'form-control',
                    'placeholder' =>'*********',
                    'id'=>'EVpassword']) !!}
                </div>
              </div>
              <div class="form-group" > 
                <label class="checkbox-inline">
                </label>
              </div>
          </div>
            <div class="modal-footer">
              <div class="form-group">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              {!!link_to('#', $title='Actualizar', $attributes = ['id'=>'btnEPassword', 'class'=>'btn btn-primary'])!!}         
              </div>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
</div>


