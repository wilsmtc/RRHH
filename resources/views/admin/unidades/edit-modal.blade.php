<div class="modal fade " id="modal-Eunidad">
	<div class="modal-dialog modal-sm">
		{!! Form::open(['id'=> 'FREUnidad']) !!}
		<div class="modal-content">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="EUtoken">
			<input type="hidden" id="EUid">
			<div class="modal-header bg-primary" style="border-radius: 0.4rem 0.4rem 0 0">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center" id="EUTitle-Label"></h4>
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
							'required', 'id' => 'EUnombre']) !!}
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
							'required', 'id' => 'EUsigla']) !!}	
						</div>
						<div class="col-md-8">
						{!! Form::label('descripcion','Descripcion de la Unidad') !!}
						{!! Form::textarea('descripcion', null,
						['class'=>'form-control',
						'style'=>"height: 100px; resize:none;",
						'id' => 'EUdescripcion']) !!}	
						</div>			
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group" >
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>				
				{!!link_to('#', $title='Editar Unidad', 
				$attributes = ['id'=>'btnENunidad', 'class'=>'btn btn-primary'])!!}				
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
