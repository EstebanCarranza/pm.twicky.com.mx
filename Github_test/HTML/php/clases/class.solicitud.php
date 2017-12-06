<?php
require_once 'modelo.php';
class solicitud
{
  function __construct() {
      
  }  
    public function obtenerSolicitud($idSolicitud)
    {
            $datos = new BaseDatos();
            $datos->abrir_conexion();
            $result = $datos->dbquery("call sp_obtenerSolicitud($idSolicitud);");

            while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
            {
                    echo "<div class='col-md-10 col-xs-10 response-client'>
                            <input type='hidden' value='$res[idSeguimiento]'>
                            <div><h1>$res[nombreCliente] • $res[correoElectronico]</h1><h4 style='float: right;margin-top: -29px; margin-right: 10px;'>Estado:<strong  class='important'> $res[estado]</strong></h4></div>
                            <h4>Telefono: $res[celular]</h4>
                            <h4>Tipo de contacto:<strong> $res[tipoContacto]</strong></h4>
                            <h2>$res[descripcion]</h2>
                           <h3>$res[comentarios]</h3>
                           <time datetime='2009-11-13T20:00' class='time'>Fecha de contacto: $res[fechaCaptura]</time>
                        </div>";

            }

            $datos->cerrar_conexion(true, $result);
    }
    
    public function atenderSolicitud($idSolicitud)
    {
        $datos = new BaseDatos();
        $datos->abrir_conexion();
        session_start();
        $folio = $idSolicitud;
        $idUsuario = $_SESSION['idUsuario'];
        $result = $datos->dbquery("call sp_AtenderSolicitud($idSolicitud, $idUsuario);");

        while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
        {
            $resultado = $res['result'];
            switch($resultado)
            {
                case 'Solicitud actualizada': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Error de solicitud': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Agente no activo o no registrado': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
            }
        }

        $datos->cerrar_conexion(true, $result);
    }
    public function responderSolicitud($idSolicitud, $respuesta)
    {
        $datos = new BaseDatos();
        $datos->abrir_conexion();
        session_start();
        $folio = $idSolicitud;
        $idUsuario = $_SESSION['idUsuario'];
        $result = $datos->dbquery("call sp_responderSolicitud($idSolicitud, $idUsuario, '$respuesta');");

        while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
        {
             $resultado = $res['result'];
            switch($resultado)
            {
                case 'Solicitud actualizada': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Error de solicitud': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Agente no activo o no registrado': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
            }
        }

        $datos->cerrar_conexion(true, $result);
    }
    public function cerrarSolicitud($idSolicitud, $respuesta)
    {
        $datos = new BaseDatos();
        $datos->abrir_conexion();
        session_start();
        $folio = $idSolicitud;
        $idUsuario = $_SESSION['idUsuario'];
        $result = $datos->dbquery("call sp_CerrarSolicitud($idSolicitud, $idUsuario, '$respuesta');");

        while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
        {
             $resultado = $res['result'];
            switch($resultado)
            {
                case 'Solicitud actualizada': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Error de solicitud': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Agente no activo o no registrado': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
            }
        }

        $datos->cerrar_conexion(true, $result);
    }
            
    
      public function responderSolicitudCliente($idSolicitud, $respuesta)
    {
        $datos = new BaseDatos();
        $datos->abrir_conexion();
        session_start();
        $folio = $idSolicitud;
        $idUsuario = $_SESSION['idUsuario'];
        $result = $datos->dbquery("call sp_responderSolicitudCliente($idSolicitud, $idUsuario, '$respuesta');");
/*
        while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
        {*/
             //$resultado = $res['result'];
            
                echo "<script> window.location ='../dashboard.php'; </script>";
                /*
                case 'Solicitud actualizada': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Error de solicitud': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Agente no activo o no registrado': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;*/
            
        /*}*/

        $datos->cerrar_conexion(true, $result);
    }
    public function cerrarSolicitudCliente($idSolicitud, $respuesta)
    {
        $datos = new BaseDatos();
        $datos->abrir_conexion();
        session_start();
        $folio = $idSolicitud;
        $idUsuario = $_SESSION['idUsuario'];
        $result = $datos->dbquery("call sp_CerrarSolicitud($idSolicitud, $idUsuario, '$respuesta');");

        while($res = mysql_fetch_array($result, MYSQL_ASSOC))	
        {
             $resultado = $res['result'];
            switch($resultado)
            {
                case 'Solicitud actualizada': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Error de solicitud': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
                case 'Agente no activo o no registrado': 
                    echo "<script> window.location ='../dashboard.php'; </script>";
                break;
            }
        }

        $datos->cerrar_conexion(true, $result);
    }
            
};
