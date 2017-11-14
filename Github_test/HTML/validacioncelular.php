<?php
	require_once 'php/clases/modelo.php';

	$celular= $_POST['celular'];

	$datos = new BaseDatos();
	$datos->abrir_conexion();
	$result = $datos->dbquery("call sp_VerProspectos ('',0,'','', 0, 10);");

	
		//echo "$email";
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
			{
				$celularDB = $res['celular'];
				if($celular==$celularDB)
				{
					echo "Telefono celular existente ingrese uno diferente";
					break 1;
				}//if
			}//while

 			if($res==0)
			echo("Telefono celular valido");

	$datos->cerrar_conexion(true, $result);
?> 