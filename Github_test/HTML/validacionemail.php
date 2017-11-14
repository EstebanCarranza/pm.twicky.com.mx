<?php
require_once 'php/clases/modelo.php';

	$email= $_POST['email'];

	$datos = new BaseDatos();
	$datos->abrir_conexion();
	$result = $datos->dbquery("call sp_VerProspectos ('',0,'','', 0, 10);");

	if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
		//echo "$email";
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
			{
				$correoDB = $res['correoElectronico'];
				if($email==$correoDB)
				{
					echo "Email existente ingrese uno diferente";
					break 1;
				}//if
				else
				{
					echo("Email valido");
				}//else
			}//while
 	
	} else {
	  echo("Email invalido");
	}

	$datos->cerrar_conexion(true, $result);
?> 
