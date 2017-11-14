<?php
//call sp_listaSolicitudes('ASC',0,10);
require_once 'modelo.php';


class dashboard
{

	function __construct()
	{
				
	}
	public function getListaSolicitudesPorCliente($idCliente, $orden, $limite1, $limite2)
	{
		$datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_infoSolicitudesCliente($idCliente, '$orden', $limite1, $limite2);");
		
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
			
			echo "
				<tr>
					<td> $res[fechaRegistro] </td>
					<td> $res[producto] </td>
					<td> $res[comentarios] </td>
					<td> $res[estado] </td>
				</tr>";

			
		}
		
		$datos->cerrar_conexion(true, $result);
	}
	
	public function getListaSolicitudes($orden, $limite1, $limite2)
	{
		$datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_listaSolicitudes('$orden',$limite1, $limite2);");
		
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
			$location = "location='../HTML/atender-solicitud.php'";
			echo "
				<tr>
					<td> $res[tiempoRegistro] </td>
					<td> $res[comentarios] </td>
					<td> $res[producto] </td>
					<td> $res[tipoContacto] </td>
					<td> $res[agente] </td>
					<td> $res[fechaSeguimiento] </td>
					<td> $res[fechaCalificacion] </td>
					<td> 
						<button type='button' class='btn btn-primary center-obj btn-sincalificar' onclick=$location> 
							$res[estado]
						</button> 
					</td>
				</tr>";

			
		}
		
		$datos->cerrar_conexion(true, $result);
	}

};

?>