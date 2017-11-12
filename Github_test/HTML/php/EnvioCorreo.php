<?php
	$destino = $_POST ["email"];
	$Nombre = $_POST["nombre"];
	$Apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$Celular = $_POST["tfno"];
	$Producto = $_POST["asunto"];
	$Producto2 = $_POST["comentarios"];
	$Contenido = "Nombre:" . $Nombre . "\nApellido:" . $Apellido . "\nCelular:" . $Celular . "\nemail:" . $email;
	$exito=mail($destino, "Bienvenido", $Contenido);
	if($exito){
		echo "Correo enviado correctamente";
	}
	else {
		echo "Hubo un error al enviar informacion";
	}
?>	
