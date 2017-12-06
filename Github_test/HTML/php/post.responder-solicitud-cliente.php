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
                    $solicitud->responderSolicitud($idSolicitud, $respuesta);    
                }
                
            }
            
        break;
        case 'atender-folio':
            $solicitud->atenderSolicitud($idSolicitud);
        break;
        case 'cerrar-folio':
             if(isset($_POST['respuesta']))
            {
                $respuesta = $_POST['respuesta'];
                if($respuesta != "" && $respuesta != null)
                {
                    $solicitud->cerrarSolicitud($idSolicitud, $respuesta);
                }
            }
        break;
    }
}