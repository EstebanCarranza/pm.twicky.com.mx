<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Clientes</title>
    
	<link rel="stylesheet"  type="text/css" href="../CSS/main-style.css">
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/form-elements.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/reporte-cliente.css"/>
    <script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="../JS/reporte-clientes.js" type="text/javascript"></script>
	
</head>
<body>
	<?php
        include('header.php');
    ?>
              <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="drop" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">Producto</a></li>
      <li><a href="#">Cliente</a></li>
      <li><a href="#">Fecha</a></li>
    </ul></div>
    <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Nombre</th>
      <th>Fecha de Registro</th>
      <th>Fecha de Atendido</th>
      <th>Duda</th>
      <th>Producto</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    <div class="btn-paginas"><button class="btn-anterior btn">Anterior</button><button class="btn-siguiente btn">Siguiente</button></div>
</body>
</html>
