<?php

	require_once 'clases/class.dashboard.php';
	require_once 'clases/class.functions.php';
	
	$fun = new funciones();
	
	$fun->session(true, true, '../index.php', 'vuelve a iniciar sesion');
		
	$dash = new dashboard();
	
	$tipo = $_SESSION['tipoUsuario'];
	$id = $_SESSION['idUsuario'];
	
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
							</tr>
						</thead>
						<tbody class='table-body'>";
							$dash->getListaSolicitudesPorCliente($id, 'DESC', 0, 10);
						echo "</tbody>
					</table>
				</section>";
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
								$dash->getListaSolicitudes('DESC', 0, 10);
							echo "</tbody>
						</table>
					</section>
				";
		break;
		
		default:
			$fun->session(false, '../../index.html', '');
		break;
		
	}

	
	
?>