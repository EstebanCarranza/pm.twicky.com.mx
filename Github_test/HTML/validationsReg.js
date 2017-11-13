function validarcellphone(){
	var valor = document.getElementById("inputCelular").value;
	var NumberRegex = /^[0-9]*$/;

	if(valor.length <= 10){
	if(NumberRegex.test(valor)){
	document.getElementById("validatetel").innerHTML = "Telefono Valido";
	}else{
		document.getElementById("validatetel").innerHTML = "Telefono Invalido";
		}
	}else{
		if(valor.length >= 10){
	document.getElementById("validatetel").innerHTML = "Telefono Invalido";
		}
	}
}//function
function equalpassword(){

	var pass1 = document.getElementById("inputPassword").value;
	var pass2 = document.getElementById("inputPassword2").value;

	if(pass1==pass2){
		document.getElementById("validatepass").innerHTML = " Contraseña Valida";
	}else{
		document.getElementById("validatepass").innerHTML = " Contraseña Invalida";
	}

}//function pass
