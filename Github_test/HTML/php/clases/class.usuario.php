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
                                $_SESSION['nombre'] = $res['nombre'];
                                $_SESSION['apellidoPaterno'] = $res['apellidoPaterno'];
                                $_SESSION['celular'] = $res['celular'];
                                $_SESSION['correoElectronico'] = $res['correoElectronico'];
                                header('Location: ../dashboard.php');
				//echo "<script>window.location = '../header.php';</script>";
			}
			else
			{
                            session_start();
                            $_SESSION['mensaje'] = "Lo sentimos :(, tu correo o contraseña son equivocados, intenta nuevamente";
                            $_SESSION['correoLog'] = $correo;
				header('Location: ../login.php?r=OK');
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
                                        if(!isset($_SESSION['mensaje']))
                                        {
                                            session_start();
                                        }
                                        $_SESSION['mensaje'] = "Gracias por mandar tu solicitud :D, te invitamos a registrarte para disfrutar de grandes beneficios";
					echo "<script> window.location='../correo.php?r=OK'</script>";
				break;
				
				case 'NO INSERTADO': case 'NO ACTUALIZADO':
                                        if(!isset($_SESSION['mensaje']))
                                        {
                                            session_start();
                                        }
                                        $_SESSION['mensaje'] = "Lo sentimos, sucedio un error, por favor intentalo de nuevo :(";
					echo "<script>window.location='../correo.php?r=NOOK'</script>";
				break;
			}
			
			
		}
		
		$datos->cerrar_conexion(true, $result);
	}
	
        public function logout()
        {
            $fun->session(false, false, '','');
	
        }
        
        public function token($correo)
        {
            $mensaje = "";
            $respuesta = "";
            $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_token('$correo');");

            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                    switch($res['result'])
                    {
                        case 'el token ya esta activo':
                            session_start();
                            
                            $mensaje = "El correo $correo ya ha sido validado anteriormente :), inicia sesión para continuar";
                            $_SESSION['mensaje'] = $mensaje;
                            $_SESSION['correoLog'] = $correo;
                            echo "<script> window.location='../login.php?r=OK'; </script>";
                        break;
                            case 'el token ya existe':
                                $mensaje = "El correo aun no ha sido validado, te reenviamos un mensaje de confimación al siguiente correo: $correo para que puedas continuar con tu registro :)";
                                $token = $res['token'];
                                $destino = $res ['correoElectronico'];
                                
                                /*
                                $Contenido = 
                                "Gracias por iniciar el proceso de registro en pm.twicky.com.mx, ya estás a un paso de ser parte del grupo :D\n 
                                Has click en el siguiente enlace para continuar: \n
                                http://pm.twicky.com.mx/?token=$token
                                ";
                                */

                                $Contenido = '
								<html>
								<head>
									<title>Bienvenido</title>
								</head>';

								$Contenido .= '
								<body style="font-family: Roboto, sans-serif;
										    font-size: 16px;
										    font-weight: 300;
										    color: #454545;
										    text-align: center;
										    background-image: url(';
										    
								$Contenido .= "'http://pm.twicky.com.mx/Images/O7MF5N0.jpg'";

								$Contenido .= ');
										    background-attachment: fixed;
										    background-repeat: no-repeat;
										    background-size: cover;">

									<div style="margin-left: 16px;
											margin-top: 16px;
											width: 100%;
											text-align: left;">
										<a href="http://pm.twicky.com.mx/"><img  style="height: 55px;
										    width: 55px;" src="http://pm.twicky.com.mx/Images/Logo.png" /></a>
									</div>

									<div style="width: 100%;">
										<table style="width: 100%;
											text-align: center;
											border: 1px solid black;
											background-color: #eee;
											border-radius: 10px;
											padding: 5px;">

										<tr>
											<td style="padding: 10px; border-bottom: 1px solid #ddd;">Gracias por iniciar el proceso de registro en <a href="pm.twicky.com.mx">Twicky</a>, ya estas a un paso de ser parte del grupo :D</td>
										</tr>
										<tr>
											<td style="padding: 10px;">Has click en el siguiente enlace para continuar:</td>
										</tr>
										<tr>
											<td style="padding: 10px;">
												<a href="http://pm.twicky.com.mx/?token='.$token.'">
													http://pm.twicky.com.mx/?token='.$token.'
												</a>
											</td>
										</tr>
										</table>
									</div>
										
									<div style="color: white;
										    text-align: center;">
										<p> 2017 | TWICKY </p>
									</div>
	
								</body>
								</html>
								';

                                //$headers  = 'MIME-Version: 1.0' . "\r\n";
								//$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                                /* $headers = 'From: soporte.tecnico@pm.twicky.com.mx' . "\r\n" .
                                            'Reply-To: soporte.tecnico@pm.twicky.com.mx' . "\r\n" .
                                            'X-Mailer: PHP/' . phpversion();
                                */

                                $headers[] = 'MIME-Version: 1.0';
                                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                                $headers[] = 'From: soporte.tecnico@pm.twicky.com.mx';
                                $headers[] = 'Reply-To: soporte.tecnico@pm.twicky.com.mx';
                                $headers[] = 'X-Mailer: PHP/' . phpversion();

                                $exito=mail($destino, "Correo de confirmacion: pm.twicky.com.mx", $Contenido, implode("\r\n", $headers));
                                if($exito)
                                    $respuesta = "OK";
                                else 
                                    $respuesta = "ERROR";
                            break;

                            case 'correcto token insertado': 
                                $mensaje = "Gracias por iniciar el proceso de registro :), por favor revisa tu correo ($correo) para continuar con el registro";
                                
                                $token = $res['token'];
                                $destino = $res ['correoElectronico'];
                                
                                /* $Contenido = 
                                "Gracias por iniciar el proceso de registro en pm.twicky.com.mx, ya estás a un paso de ser parte del grupo :D\n 
                                Has click en el siguiente enlace para continuar: \n
                                http://pm.twicky.com.mx/?token=$token
                                ";
                                */
                                /* 
                                $Contenido .= '
                                <html>
								<head>
									<title></title>
								</head>
								<body>
									<div>
										<a href="http://pm.twicky.com.mx/"><img src="http://pm.twicky.com.mx/Images/Logo.png" /></a>
									</div>
								</body>
								</html>
								';
								*/

								$Contenido = '
								<html>
								<head>
									<title>Bienvenido</title>
								</head>';

								$Contenido .= '
								<body style="font-family: Roboto, sans-serif;
										    font-size: 16px;
										    font-weight: 300;
										    color: #454545;
										    text-align: center;
										    background-image: url(';

								$Contenido .= "'http://pm.twicky.com.mx/Images/O7MF5N0.jpg'";

								$Contenido .= ');
										    background-attachment: fixed;
										    background-repeat: no-repeat;
										    background-size: cover;">

									<div style="margin-left: 16px;
											margin-top: 16px;
											width: 100%;
											text-align: left;">
										<a href="http://pm.twicky.com.mx/"><img  style="height: 55px;
										    width: 55px;" src="http://pm.twicky.com.mx/Images/Logo.png" /></a>
									</div>

									<div style="width: 100%;">
										<table style="width: 100%;
											text-align: center;
											border: 1px solid black;
											background-color: #eee;
											border-radius: 10px;
											padding: 5px;">

										<tr>
											<td style="padding: 10px; border-bottom: 1px solid #ddd;">Gracias por iniciar el proceso de registro en <a href="pm.twicky.com.mx">Twicky</a>, ya estas a un paso de ser parte del grupo :D</td>
										</tr>
										<tr>
											<td style="padding: 10px;">Has click en el siguiente enlace para continuar:</td>
										</tr>
										<tr>
											<td style="padding: 10px;">
												<a href="http://pm.twicky.com.mx/?token='.$token.'">
													http://pm.twicky.com.mx/?token='.$token.'
												</a>
											</td>
										</tr>
										</table>
									</div>
										
									<div style="color: white;
										    text-align: center;">
										<p> 2017 | TWICKY </p>
									</div>
	
								</body>
								</html>
								';

                                //$headers  = 'MIME-Version: 1.0' . "\r\n";
								//$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                                /* $headers = 'From: soporte.tecnico@pm.twicky.com.mx' . "\r\n" .
                                            'Reply-To: soporte.tecnico@pm.twicky.com.mx' . "\r\n" .
                                            'X-Mailer: PHP/' . phpversion(); */

                                $headers[] = 'MIME-Version: 1.0';
                                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                                $headers[] = 'From: soporte.tecnico@pm.twicky.com.mx';
                                $headers[] = 'Reply-To: soporte.tecnico@pm.twicky.com.mx';
                                $headers[] = 'X-Mailer: PHP/' . phpversion();


                                $exito=mail($destino, "Correo de confirmación: pm.twicky.com.mx", $Contenido, implode("\r\n", $headers));
                                if($exito)
                                    $respuesta = "OK";
                                else 
                                    $respuesta = "ERROR";
                                
                            break;
                    }


            }

            $datos->cerrar_conexion(true, $result);
            
           
                $_SESSION['mensaje'] = $mensaje;
                echo "<script>window.location='../correo.php?r=$respuesta';</script>";
           
        }
        
        public function validarToken($token)
        {
            //sp_validarToken
            $datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_validarToken('$token');");
		
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
			switch($res['result'])
			{
				case 'Token invalido':
                                    echo "<script> window.location='?mensaje=token invalido';</script>";
				break;
                                case 'Token ya activo':
                                    echo "<script> window.location='HTML/login.php';</script>";
                                break;
                            
				case 'Token Correcto': 
                                    
                                        session_start();
                                    
                                        $_SESSION['tokenOK'] = "OK";
                                    echo "<script>window.location='HTML/registro.php';</script>";
				break;
			}
			
			
		}
		
		$datos->cerrar_conexion(true, $result);
        }
            
        
};

?>