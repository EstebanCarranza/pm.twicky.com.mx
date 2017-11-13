function productos(){

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

var url= "php/productos.php";
request.open("POST", url, true);

request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

request.onreadystatechange= function() {
if (request.readyState == 4 && request.status == 200) {
	var return_data=  request.responseText;
	document.getElementById("products-combo").innerHTML= return_data;
}
}

request.send(null);


	}	//function