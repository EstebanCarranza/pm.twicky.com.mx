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
    
    if(isset($_GET['folio']))
    {
        $idSolicitud = $_GET['folio'];
    }
    else
    {
        echo "<script> window.location = 'dashboard.php'; </script>";
    }

    $pagIS1 = intVal($pagF, 10);
    $pagFS1 = intVal($pagIS1, 10) + 10;
 
    $totalPrincipal = $reporte->getTotalClienteVerHistorial($id, $idSolicitud, $orden, $pag, $pagF);
    $totalSiguiente = $reporte->getTotalClienteVerHistorial($id, $idSolicitud, $orden, $pagIS1, $pagFS1);

    if($totalPrincipal == null) echo "<script> window.location = 'ver-historial.php'; </script>";
    
    
    
$reporte->ClienteVerHistorial($_SESSION['idUsuario'],$idSolicitud, $orden, $pag, $pagF);