<?php
//call sp_listaSolicitudes('ASC',0,10);
require_once 'clases/class.usuario.php';

if(isset($_POST['form-email']) || isset($_POST['password']))
{
    $correo = $_POST['form-email'];
    $contrasenia = $_POST['password'];
}
else
{
    session_start();
    if(isset($_SESSION['form-email']) || isset($_SESSION['password']))
    {
        $correo = $_SESSION['form-email'];
        $contrasenia = $_SESSION['password'];
    }
    
}

if($correo != null || $contrasenia != null)
{
	$registro = new usuario();
	$registro->login($correo, $contrasenia);
}

?>