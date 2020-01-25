<!-- Modal Confirmacion Eliminar Usuario -->
<div class="modal fade " id="delete-user"> 
	<div class="modal-dialog modal-sm-5px">
		<div class="modal-content bg-red">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center" >CONFIRMACION</h4>
			</div>
			<form action="{{ route('users.destroy', 'test') }}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
		    <div class="modal-body ">
				<h4 class="text-center" id="CTitle">
					
				</h4>
		      	<input type="hidden" name="user_id" id="user_id" value="">
			</div>
	     	<div class="modal-footer">
	       		<button type="button" class="btn btn-warning" data-dismiss="modal">No, Cancel</button>
	        	<button type="submit" class="btn btn-primary">Yes, Delete</button>
	      	</div>
    	  	</form>
		</div>
	</div>
</div>