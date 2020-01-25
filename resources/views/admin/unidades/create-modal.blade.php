<div class="modal fade " id="modal-Runidad">
	<div class="modal-dialog modal-sm">
		{!! Form::open(['id'=> 'FRUnidad']) !!}
		<div class="modal-content">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="RUtoken">
			<div class="modal-header bg-primary" style="border-radius: 0.4rem 0.4rem 0 0">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center" >Formulario - Nueva Unidad</h4>
			</div>
			<div class="modal-body" style="resize: none; ">
				<div class="form-group">
					<div class="row">
						<div class="col-md-8">
						{!! Form::label('nombre','Nombre de la Unidad') !!}
						{!! Form::text(
							'nombre',null,
							['class'=>'form-control',
							'placeholder' =>'Nombre de la Unidad',
							'required', 'id' => 'RUnombre']) !!}
						</div>
					</div>
				</div> 
				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
						{!! Form::label('sigla','Sigla') !!}
						{!! Form::text(
							'sigla',null,
							['class'=>'form-control',
							'placeholder' =>'Sigla de la Unidad',
							'required', 'id' => 'RUsigla']) !!}	
						</div>
						<div class="col-md-8">
						{!! Form::label('descripcion','Descripcion de la Unidad') !!}
						{!! Form::textarea('descripcion', null,
						['class'=>'form-control',
						'style'=>"height: 100px; resize:none;",
						'id' => 'RUdescripcion']) !!}	
						</div>			
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group" >
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>				
				{!!link_to('#', $title='Registrar Unidad', 
				$attributes = ['id'=>'btnRNunidad', 'class'=>'btn btn-primary'])!!}				
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
