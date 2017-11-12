<?php
//call sp_listaSolicitudes('ASC',0,10);
require_once 'modelo.php';

class usuario
{
	
	
	function __construct()
	{
		
	}
	
	public function login($correo, $contrasenia)
	{
		$datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_login('$correo','$contrasenia');");
		
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
			if($res['idUsuario'] <> 0)
			{
				$tipoUsuario = $res['tipoUsuario'];
				session_start();
				$_SESSION['idUsuario'] = $res['idUsuario'];
				$_SESSION['tipoUsuario'] = $res['tipoUsuario'];
                                $_SESSION['nombreUsuario'] = $res['nombreUsuario'];
                                header('Location: ../dashboard.php');
				//echo "<script>window.location = '../header.php';</script>";
			}
			else
			{
				header('Location: ../login.php');
			}
			
		}
		
		$datos->cerrar_conexion(true, $result);
	}
	
	public function registro($correo, $contrasenia, $celular, $nombre, $apellidoPaterno)
	{
		$datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_registroCliente (null, '$correo', '$contrasenia', $celular, null, null, '$nombre', '$apellidoPaterno', null, null, null, null, null,null, null, null);");
		
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
			switch($res['result'])
			{
				case 'INSERTADO': case 'ACTUALIZADO':
					echo "<script> window.location='../login.php?mensaje=registro exitoso'</script>";
				break;
				
				case 'El alias ya existe':
					echo "<script> window.location='../registro.php?mensaje=el alias ya existe'</script>";
				break;
				
				case 'El correo ya existe':
					echo "<script> window.location='../registro.php?mensaje=el correo ya existe'</script>";
				break;
				
				case 'El telefono capturado ya existe':
					echo "<script> window.location='../registro.php?mensaje=el telefono ya existe'</script>";
				break;
				
				case 'NO INSERTADO': case 'NO ACTUALIZADO':
					echo "<script>window.location='../login.php?mensaje=registro exitoso'</script>";
				break;
			}
			
			
		}
		
		$datos->cerrar_conexion(true, $result);
	}
	
	
	public function prospecto($correo,$day,$celular,$nombre,$apellidoPaterno,$comentarios, $horaInicio, $horaFin, $idProducto)
	{
		$datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_registroProspecto('$correo',$celular,'$nombre','$apellidoPaterno', $idProducto,'$comentarios','$day','$horaInicio', '$horaFin');");
		
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
			switch($res['result'])
			{
				case 'INSERTADO':
					echo "<script> window.location='../login.php?mensaje=registro exitoso'</script>";
				break;
				
				case 'NO INSERTADO': case 'NO ACTUALIZADO':
					echo "<script>window.location='../login.php?mensaje=registro exitoso'</script>";
				break;
			}
			
			
		}
		
		$datos->cerrar_conexion(true, $result);
	}
	
        public function logout()
        {
            $fun->session(false, false, '','');
	
        }
};

?>