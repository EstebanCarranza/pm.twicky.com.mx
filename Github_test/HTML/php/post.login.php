<?php
//call sp_listaSolicitudes('ASC',0,10);
require_once 'clases/class.usuario.php';

if(isset($_POST['form-email'])) 		$correo = $_POST['form-email'];
if(isset($_POST['password']))		$contrasenia = $_POST['password'];

if($correo != null || $contrasenia != null)
{
	$registro = new usuario();
	$registro->login($correo, $contrasenia);
}

?>