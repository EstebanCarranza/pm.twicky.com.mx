$(document).ready(function(){
	validarDias();
});

function validarDias(){
	if($(".form-group input:checkbox:checked").length > 0)
		$("#btn_submit").prop( "disabled", false );
	else 
		$("#btn_submit").prop( "disabled", true );
}