function equalpassword(){

	var pass1 = document.getElementById("inputPassword").value;
	var pass2 = document.getElementById("inputPassword2").value;

	if(pass1==pass2){
		document.getElementById("validatepass").innerHTML = " Contraseña Valida";
	}else{
		document.getElementById("validatepass").innerHTML = " Contraseña Invalida";
	}

}//function pass
