$('#modal-RUsers').on('shown.bs.modal', function () { 
	document.getElementById("FRUsers").reset();
});
$('#modal-ROficina').on('shown.bs.modal', function () { 
	//document.getElementById("FROficina").reset();
	$('#ROnombre').val("");
	$('#ROdescripcion').val("");
}); 


$('#modal-EOficina').on('shown.bs.modal', function () { 
	//document.getElementById("FROficina").reset();
    $('#EOnombre').css('border','');
    $('#EOdescripcion').css('border','');
}); 


$('#modal-RArchivo').on('shown.bs.modal', function () { 
	//document.getElementById("FRArchivos").reset();
	$("#btnRArchivo").attr("disabled", true);
});     
/*$('#modal-Eauxiliar').on('shown.bs.modal', function () { 
	document.getElementById("FEAuxiliar").reset();
});  */    
