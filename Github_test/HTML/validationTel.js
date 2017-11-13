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