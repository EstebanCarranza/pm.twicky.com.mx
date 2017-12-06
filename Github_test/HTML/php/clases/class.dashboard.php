<?php
//call sp_listaSolicitudes('ASC',0,10);
require_once 'modelo.php';


class dashboard
{

	function __construct()
	{
				
	}
        
        public function getTutorial()
        {
            if($_SESSION['verHistorial'] == "1" && $_SESSION['tipoUsuario'] == "Cliente")
            {
                echo "
                        <div id='tuto-div-content' class='tuto-content'>
                            <div class='tuto-form'>
                                <h1 id='login-title'><strong>¿Quieres ver el tutorial?</strong></h1>
                                <hr>
                                <button id='tuto-btn-si' class='btn btn-calificado tuto-btn-RES' type='button'>Si</button>
                                <button id='tuto-btn-no' class='btn btn-calificando tuto-btn-RES' type='button'>No</button>
                                <hr>
                                <form action='php/post.ocultarTutorial.php' method='post'>
                                    <button class='btn btn-sinCalificar tuto-btn-NO' type='submit'>No volver a mostrar este mensaje</button>
                                
                                </form>
                            </div>
                        </div>
                     ";
            }
        }
        public function ocultarTutorial($idUsuario, $tipoUsuario)
        {
            
            
            $datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_DesactivarTutorial($idUsuario,'$tipoUsuario');");
		
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
                    if ($res['result'] == 'OK')
                    {
                        $_SESSION['verHistorial'] = 0;
                        echo "<script> window.location = '../dashboard.php'; </script>";
                    }
                    else
                        echo "<script> window.location = '../dashboard.php'; </script>";
		}
		
		$datos->cerrar_conexion(true, $result);
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
                                        <td> 
                                           ";
                                        switch($res['estado'])
                                        {
                                            case 'sin calificar':
                                                   echo "
                                                       <form method='get' action='responder-solicitud.php'>
                                                        <input name='folio' type='hidden' value='$res[idSeguimiento]'>
                                                        <button type='submit' class='btn btn-primary center-obj btn-sincalificar'> 
                                                            Enviar mensaje
                                                        </button> 
                                                        </form>
                                                    ";
                                            break;
                                            
                                            case 'calificando':
                                                 echo "
                                                     <form method='get' action='responder-solicitud.php'>
                                                        <input name='folio' type='hidden' value='$res[idSeguimiento]'>
                                                        <button type='submit' class='btn btn-primary center-obj btn-calificando'> 
                                                            Responder
                                                        </button> 
                                                        </form>
                                                        ";  
                                            break;
                                            case 'calificado':
                                                 echo "
                                                        <input name='folio' type='hidden' value='$res[idSeguimiento]'>
                                                        <button type='submit' disabled class='btn btn-primary center-obj btn-calificado'> 
                                                            $res[estado]
                                                        </button> 
                                                        ";  
                                            break;
                                        }

                                     
                        
                        echo " 
                                        </td>
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
                                            <form action='atender-solicitud.php' method='get'>
                                                ";

                                        switch($res['estado'])
                                        {
                                            case 'sin calificar':
                                                   echo "
                                                        <input name='folio' type='hidden' value='$res[idSeguimiento]'>
                                                        <button type='submit' class='btn btn-primary center-obj btn-sincalificar'> 
                                                            $res[estado]
                                                        </button> 
                                                    ";
                                            break;
                                            
                                            case 'calificando':
                                                 echo "
                                                        <input name='folio' type='hidden' value='$res[idSeguimiento]'>
                                                        <button type='submit' class='btn btn-primary center-obj btn-calificando'> 
                                                            $res[estado]
                                                        </button> 
                                                        ";  
                                            break;
                                            case 'calificado':
                                                 echo "
                                                        <input name='folio' type='hidden' value='$res[idSeguimiento]'>
                                                        <button type='submit' class='btn btn-primary center-obj btn-calificado'> 
                                                            $res[estado]
                                                        </button> 
                                                        ";  
                                            break;
                                        }

                                     
                                                       
                                             echo   " 
                                            </form>
					</td>
				</tr>";

			
		}
		
		$datos->cerrar_conexion(true, $result);
	}

        public function getTotalListaSolicitudes($orden, $limite1, $limite2)
	{
		$datos = new BaseDatos();
		$datos->abrir_conexion();
		$result = $datos->dbquery("call sp_ListaSolicitudesCountRows('$orden',$limite1, $limite2);");
		$total = 0;
		while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
		{
                    $total = intval($total, 10) + 1;
		}
		
		$datos->cerrar_conexion(true, $result);
                
                return $total;
	}
        
        public function getTotalSolicitudesPorCliente($idCliente, $orden, $limite1, $limite2)
        {
            //
            $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_ListaSolicitudesPorClienteCountRow($idCliente, '$orden',$limite1, $limite2);");
            $total = 0;
            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                $total = intval($total, 10) + 1;
            }

            $datos->cerrar_conexion(true, $result);

            return $total;
        }
};

?>