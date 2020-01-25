<div class="modal fade" id="MeditPermissions">
	<div class="modal-dialog">
	{!! Form::open([ 'id'=> 'form','autocomplete'=>'off']) !!}
		<div class="modal-content">
			<div class="modal-header bg-primary" style="border-radius: 0.4rem 0.4rem 0 0">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center" id="EPTitle-Label"></h4> 
			</div>
			<div class="modal-body" align="center">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        	<input type="hidden" id="id">
					<div class="form-group" align="center"> 
					<label class="checkbox-inline">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" id="Eadd">
								Agregar
							</label>
						</div>
					</label>
					<label class="checkbox-inline">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" id="Eedit">
								Editar
							</label>
						</div>
					</label>
					<label class="checkbox-inline">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" id="Eremove">
								Eliminar
							</label>
						</div>
					</label>
					</div>
			</div>
           		{!! Form::close() !!}
	        <div class="modal-footer">
	          <div class="form-group">
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	          {!!link_to('#', $title='Actualizar', $attributes = ['id'=>'btnEPermissions', 'class'=>'btn btn-primary'])!!}
	          </div>
	        </div>
		</div>

	</div>
</div>

