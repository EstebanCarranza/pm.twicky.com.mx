<?php

require_once 'clases/class.solicitud.php';

if(isset($_POST['folio']) && isset($_POST['funcion']))
{
    $idSolicitud = $_POST['folio'];
    $funcion = $_POST['funcion'];
    $solicitud = new solicitud();
    
    switch($funcion)
    {
        case 'responder-folio':
            if(isset($_POST['respuesta']))
            {
                $respuesta = $_POST['respuesta'];
                if($respuesta != "" && $respuesta != null)
                {
                    $solicitud->responderSolicitudCliente($idSolicitud, $respuesta);    
                }
                
            }
            
        break;
        case 'atender-folio':
            $solicitud->atenderSolicitudCliente($idSolicitud);
        break;
        case 'cerrar-folio':
             if(isset($_POST['respuesta']))
            {
                $respuesta = $_POST['respuesta'];
                if($respuesta != "" && $respuesta != null)
                {
                    $solicitud->cerrarSolicitudCliente($idSolicitud, $respuesta);
                }
            }
        break;
    }
}