<DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Twicky</title>
    
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../CSS/form-elements.css"/>
        <link rel="stylesheet" type="text/css" href="../CSS/main-style.css"/>
	<script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
	
</head>
<body>
	<header>
	<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="../index.php"><img  class="logo" src="../Images/Logo.png" /></a>
						</div>
						<ul class="list-inline">
						
						   <li class='list-inline-item'>
								<h3> ¡Hola [nombre de agente] ! </h3>
						   </li>
                            <li class="list-inline-item"> 
								<button type="button" class="btn btn-primary reporte-cliente" onclick="location='../HTML/reporte-clientes-atendidos.html'">
									<strong> Reporte de clientes </strong>
								</button>
							</li>
                               <li class="list-inline-item"> 
								<button type="button" class="btn btn-primary reporte-producto" onclick="location='../index.php'">
									<strong> Reporte de productos </strong>
								</button>
							</li>
                             <li class="list-inline-item"> 
								<button type="button" class="btn btn-primary reporte-cliente-cliente" onclick="location='../HTML/reporte-clientes.html'">
									<strong> Reporte de clientes </strong>
								</button>
							</li>
							<li class="list-inline-item"> 
								<button type="button" class="btn btn-primary logout" onclick="location='../index.php'">
									<strong> Cerrar sesion </strong>
								</button>
							</li>
						</ul>
					</div>
			</nav>
	</header>
	<?php
		require_once 'php/post.dashboard.php';
	?>
</body>

</DOCTYPE>