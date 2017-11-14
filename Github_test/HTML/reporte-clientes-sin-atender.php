<DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Clientes Atendidos </title>
    <link rel="stylesheet" type="text/css" href="../CSS/reporte-cliente.css"/>
	
</head>
<body>
	<?php
        include('header.php');
    ?>
  <table class="table table-hover">
  <thead class="thead-inverse">
    <tr>
      <th>Nombre</th>
      <th>Fecha de captura</th>
      <th>Duda</th>
      <th>Mi respuesta</th>
      
      <th>Producto</th>
      <th>Atender</th>
    </tr>
  </thead>
  <tbody>
      <?php require_once 'php/get.reporte-clientes-sin-atender.php'; ?>
    
  </tbody>
</table>
    <div class="btn-paginas"><button class="btn-anterior btn">Anterior</button><button class="btn-siguiente btn">Siguiente</button></div>
</body>

</DOCTYPE>