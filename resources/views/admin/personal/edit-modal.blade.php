<div class="modal fade " id="modal-Epersonal">
	<div class="modal-dialog modal-sm">
		{!! Form::open(['id'=> 'FREpersonal', 'autocomplete' => 'off']) !!}
		<div class="modal-content">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="EPtoken">
			<input type="hidden" id="EPid">
			<div class="modal-header bg-primary" style="border-radius: 0.4rem 0.4rem 0 0">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center" id="EPTitle-Label"></h4>
			</div>
			<div class="modal-body" style="resize: none; ">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
							  	{!! Form::label('nombre','Nombre del Personal') !!}
							  	{!! Form::text('nombre',null, 
							  		['class'=>'form-control',
									'placeholder' =>'Nombre del Personal',
									'id'=>'EPnombre']) !!}
							</div>
							<div class="col-sm-6">
							  	{!! Form::label('apellido','Apellido del Personal') !!}
							  	{!! Form::text('apellido',null, 
							  		['class'=>'form-control',
									'placeholder' =>'Apellido del Personal',
									'id'=>'EPapellido']) !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
							  	{!! Form::label('ci','Carnet de Identidad') !!}
							  	{!! Form::text('ci',null, 
							  		['class'=>'form-control',
									'placeholder' =>'Carnet de Identidad',
									'id'=>'EPci']) !!}
							</div>
							<div class="col-sm-6">
							  	{!! Form::label('ciudad_id','Expedito') !!}
							  	<select class='form-control select_Pciudad' style="width: 100%"  id="EPlist_ciudades">
							  		<option value=""></option>
							  		@foreach ($ciudades as $ciudad)
							  		{{-- expr --}}
							  		<option value="{!! $ciudad->id !!}"> 
							  			{!! $ciudad->nombre !!}
							  		</option>
							  		@endforeach
							  	</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
							  	{!! Form::label('celular','Celular') !!}
							  	{!! Form::text('celular',null, 
							  		['class'=>'form-control',
									'placeholder' =>'Numero de Celular',
									'id'=>'EPcelular']) !!}
							</div>
							<div class="col-sm-6">
							  	{!! Form::label('cargo','Cargo') !!}
							  	{!! Form::text('cargo',null, 
							  		['class'=>'form-control',
									'placeholder' =>'Cargo del Personal',
									'id'=>'EPcargo']) !!}
							</div>						
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
							  	{!! Form::label('ciudad_id','Expedito') !!}
							  	<select class='form-control select_Punidades' style="width: 100%"  id="EPlist_unidades">
							  		<option value=""></option>
							  		@foreach ($unidades as $unidad)
							  		{{-- expr --}}
							  		<option value="{!! $unidad->id !!}"> 
							  			{!! $unidad->nombre !!}
							  		</option>
							  		@endforeach
							  	</select>
							</div>					
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<div class="form-group" >
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>				
				{!!link_to('#', $title='Actializar Personal', 
				$attributes = ['id'=>'btnEpersonal', 'class'=>'btn btn-primary'])!!}				
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
