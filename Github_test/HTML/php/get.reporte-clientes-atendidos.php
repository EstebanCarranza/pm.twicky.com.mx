<?php
require_once 'clases/class.reportes.php';

$reporte = new reportes();
$reporte->clientes_atendidos($_SESSION['idUsuario'], 'ASC', 'nombre', 0, 10);