<?php
require_once 'clases/modelo.php';

		$datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_VerProductos ('',0,'','', 0, 10);");
		
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
			$opcion = $res['descripcion'];
			echo "<option>$opcion</option>";	
		}

		$datos->cerrar_conexion(true, $result);
		
		
		/*echo "<option>hehexD</option>";
		echo "<option>hahaxD</option>";*/
?>
