<DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Clientes Atendidos </title>
    <link rel="stylesheet" type="text/css" href="../CSS/reporte-cliente.css"/>
    <script> 
            function pagAnt(pagina)
            {
                
                pagina = parseInt(pagina) - 10;
                window.location = 'reporte-clientes-sin-atender.php?pag=' + pagina;
            }
            function pagSig(pagina)
            {
                
                pagina = parseInt(pagina) + 10;
                window.location = 'reporte-clientes-sin-atender.php?pag=' + pagina;
            }
    </script>
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
     <?php 
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
    ?>
</body>

</DOCTYPE>