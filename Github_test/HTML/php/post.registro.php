<?php

require_once 'clases/class.usuario.php';

if(isset($_POST['form-email'])) 		$correo = $_POST['form-email'];
if(isset($_POST['contrasenia-01']))		$contrasenia = $_POST['contrasenia-01'];
if(isset($_POST['celular'])) 			$celular = $_POST['celular'];
if(isset($_POST['nombre']))				$nombre = $_POST['nombre'];
if(isset($_POST['apellidoPaterno']))	$apellidoPaterno = $_POST['apellidoPaterno'];

if($correo != null || $contraseña != null || $celular != null || $nombre != null || $apellidoPaterno != null)
{
    if(!isset($_SESSION['registro']))
    {
        session_start();
    }
    $_SESSION['registro'] = new usuario();
    $_SESSION['registro']->registro($correo, sha1($contrasenia), $celular, $nombre, $apellidoPaterno);	
        
}


?>