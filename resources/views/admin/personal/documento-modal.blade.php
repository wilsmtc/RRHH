<!-- Modal ActaRecepcion-->
<div class="modal fade" id="modal-RArchivo">
	<div class="modal-dialog">
		{!! Form::open(['route' => 'archivos.store', 'method' => 'POST', 'files'=> true ,'id'=> 'FRArchivos']) !!}
		<div class="modal-content">
			<div class="modal-header bg-primary" style="border-radius: 0.4rem 0.4rem 0 0">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center ">REGISTRO DE CURRICULUM</h4>
			</div>
			<div class="modal-body">
				
				<div class="row">
					<div class="form-group">					
						<div class="col-xs-12">
						{!! Form::label('pdf','Seleccione el Archivo') !!}
						{!! Form::file(
							'image',
							['class'=>'file','id'=>'file_input_A','type'=>'file']
						) !!}
						</div>
					
												  	{!! Form::hidden('id',null, 
							  		['class'=>'form-control',
									'placeholder' =>'Apellido del Personal',
									'id'=>'RAid']) !!}
					</div> 
				</div>
			</div>
			<div class="modal-footer">
				{!!link_to('#', $title='Verificar Archivo', $attributes = ['id'=>'btnAVerificar', 'class'=>'btn btn-warning'])!!}
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				{!! Form::submit('Enviar Archivo',
					['class'=>'btn btn-primary','id' => 'btnRArchivo']) !!}
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>