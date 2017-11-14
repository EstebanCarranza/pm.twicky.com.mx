function validarcellphone() {

var request;

try {

request= new XMLHttpRequest();

}

catch (tryMicrosoft) {

try {

request= new ActiveXObject("Msxml2.XMLHTTP");
}

catch (otherMicrosoft) 
{
try {
request= new ActiveXObject("Microsoft.XMLHTTP");
}

catch (failed) {
request= null;
}
}
}



var url= "validacioncelular.php";
var telephone= document.getElementById("inputCelular").value;
var NumberRegex = /^[0-9]*$/;
var vars= "celular="+telephone;
request.open("POST", url, true);

request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

request.onreadystatechange= function() {
if (request.readyState == 4 && request.status == 200) {
	var return_data=  request.responseText;


	if(telephone.length <= 10){
	if(NumberRegex.test(telephone)){
		document.getElementById("validatetel").innerHTML= return_data;
	}else{
		document.getElementById("validatetel").innerHTML = "Telefono celular Invalido";
		}
	}else{
		if(telephone.length >= 10){
		document.getElementById("validatetel").innerHTML = "Telefono celular Invalido";
		}
	}

	
}
}

request.send(vars);
}

/*
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
}//function cellphone
*/