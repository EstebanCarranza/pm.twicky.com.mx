<?php
require_once 'clases/class.reportes.php';

    $id = $_SESSION['idUsuario'];
    $reporte = new reportes();
    if(isset($_GET['pag']))
    {
        $valPag = $_GET['pag'];
        $pag = intVal($valPag, 10);
        $pagF = intVal($pag, 10) + 10;
        $orden = "DESC";
        $campo = "nombre";
    }    
    else
    {
        $pag = 0;
        $pagF = 10;
        $orden = "DESC";
        $campo = "nombre";
    }

    $pagIS1 = intVal($pagF, 10);
    $pagFS1 = intVal($pagIS1, 10) + 10;
 
    $totalPrincipal = $reporte->getTotalClientesSinAtender($id, $orden, $campo, $pag, $pagF);
    $totalSiguiente = $reporte->getTotalClientesSinAtender($id, $orden, $campo, $pagIS1, $pagFS1);

    
    
    
    
$reporte->clientes_sin_atender($_SESSION['idUsuario'], $orden, 'nombre', $pag, $pagF);