<?php

	require_once 'clases/class.dashboard.php';
	require_once 'clases/class.functions.php';
	
	$fun = new funciones();
	
	$fun->session(true, true, '../index.php', 'vuelve a iniciar sesion');
		
	$dash = new dashboard();
	
	$tipo = $_SESSION['tipoUsuario'];
	$id = $_SESSION['idUsuario'];
        
        
        
	
       
        
        
        if(isset($_GET['pag']))
        {
            $valPag = $_GET['pag'];
            $pag = intVal($valPag, 10);
            $pagF = intVal($pag, 10) + 10;
            $orden = "DESC";
        }    
        else
        {
            $pag = 0;
            $pagF = 10;
            $orden = "DESC";
        }
            
            $pagIS1 = intVal($pagF, 10);
            $pagFS1 = intVal($pagIS1, 10) + 10;
            
            switch($tipo)
            {
                case 'Cliente':
                    $totalPrincipal = $dash->getTotalSolicitudesPorCliente($id, $orden, $pag, $pagF);
                    $totalSiguiente = $dash->getTotalSolicitudesPorCliente($id, $orden, $pagIS1, $pagFS1);
                break;
                case 'Agente':
                    $totalPrincipal = $dash->getTotalListaSolicitudes($orden, $pag, $pagF);
                    $totalSiguiente = $dash->getTotalListaSolicitudes($orden, $pagIS1, $pagFS1);
                break;
            }
            
            
            //if($totalPrincipal == null) echo "<script> window.location = 'dashboard.php'; </script>";
            
            /*
            if($totalPrincipal != null) 
                echo "
                        Total de registros actuales: $totalPrincipal <br>
                        Total de registros siguientes: $totalSiguiente";
            */
      
 
        
	switch($tipo)
	{
            case 'Cliente':
                echo "
                    <section class='content dash-cliente'>
                        <table class='table table-hover table-striped table-responsive'>
                            <thead class='thead-inverse table-head-row' >
                                <tr class='align-center font-big'>
                                        <th colspan='4'> Mis solicitudes </th>
                                </tr>
                                <tr class='w-100'>
                                    <th scope='col' id='td-col-fecha' class='w-25'> 		Fecha de registro 		</th>
                                    <th scope='col' id='td-col-producto' class='w-25'> 	Producto 				</th>
                                    <th scope='col' id='td-col-comentario' class='w-25'> Comentario	 			</th>
                                    <th scope='col' id='td-col-estado' class='w-25'> 	Estado 					</th>
                                    <th scope='col'>Responder</th>
                                </tr>
                                
                            </thead>
                            <tbody class='table-body'>";
                                $dash->getListaSolicitudesPorCliente($id, $orden, $pag, $pagF);
                    echo    "</tbody>
                        </table>";
                    
                    echo "<div class='btn-paginas'>";
                            if(isset($_GET['pag']))
                            {
                                if(!$_GET['pag'] == 0)
                                {
                                    echo "<button class='btn-anterior btn' onclick=pagAnt($pag)>Anterior</button>";       
                                }

                            }
                          if($totalSiguiente != 0)
                            {
                                echo "<button class='btn-siguiente btn' onclick=pagSig($pag)>Siguiente</button>";    
                            }

                        echo "</div>";
                    echo "</section>";
            break;
		
		case 'Agente':
			echo "
                            <section class='content dash-agente'>
                                <table class='table table-hover table-striped table-responsive'>
                                    <thead class='thead-inverse table-head-row fixed-section'>
                                            <tr class='align-center font-big'>
                                                    <th colspan='8'> Solicitudes de clientes y prospectos </th>
                                            </tr>
                                            <tr>
                                                    <th scope='col' id='td-col-fecha'> 		Fecha de registro 		</th>
                                                    <th scope='col' id='td-col-comentario'> Comentario	 			</th>
                                                    <th scope='col' id='td-col-producto'> 	Producto 				</th>
                                                    <th scope='col' id='td-col-tipoCon'> 	Tipo de contacto 		</th>
                                                    <th scope='col' id='td-col-agente'> 	Agente					</th>
                                                    <th scope='col' id='td-col-fechaSeg'> 	Fecha de seguimiento 	</th>
                                                    <th scope='col' id='td-col-fechaFin'> 	Fecha de finalización 	</th>
                                                    <th scope='col' id='td-col-estado'> 	Estado 					</th>
                                            </tr>
                                    </thead>
                                    <tbody class='table-body'>";
                                            $dash->getListaSolicitudes($orden, $pag, $pagF);
                                    echo "</tbody>
                                </table>";
                                
                                    echo "<div class='btn-paginas'>";
                                    if(isset($_GET['pag']))
                                    {
                                        if(!$_GET['pag'] == 0)
                                        {
                                            echo "<button class='btn-anterior btn' onclick=pagAnt($pag)>Anterior</button>";       
                                        }
                                    }
                                    if($totalSiguiente != 0)
                                    {
                                        echo "<button class='btn-siguiente btn' onclick=pagSig($pag)>Siguiente</button>";    
                                    }
                                    
                                    echo "</div>";
                            echo "</section>
				";
		break;
		
		default:
			$fun->session(false, '../../index.html', '');
		break;
		
	}

	
	
?>