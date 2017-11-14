<?php
require_once 'clases/class.reportes.php';

$reporte = new reportes();
$reporte->clientes_sin_atender($_SESSION['idUsuario'], 'ASC', 'nombre', 0, 10);