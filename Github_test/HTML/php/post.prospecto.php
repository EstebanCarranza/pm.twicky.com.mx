<?php
//call sp_listaSolicitudes('ASC',0,10);
require_once 'clases/class.usuario.php';

if(isset($_POST['form-email'])) 			$correo = $_POST['form-email'];
if(isset($_POST['form-day']))				$day = $_POST['form-day'];
if(isset($_POST['form-telephone']))			$celular = $_POST['form-telephone'];
if(isset($_POST['form-first-name']))		$nombre = $_POST['form-first-name'];
if(isset($_POST['form-last-name']))			$apellidoPaterno = $_POST['form-last-name'];
if(isset($_POST['form-about-yourself'])) 	$comentarios = $_POST['form-about-yourself'];
if(isset($_POST['form-begin-hour']))		$horaInicio = $_POST['form-begin-hour'];
if(isset($_POST['form-end-hour']))			$horaFin = $_POST['form-end-hour'];
if(isset($_POST['form-producto']))			$idProducto = $_POST['form-producto'];

$var = "";
for($i = 0; $i < 7; $i = intVal($i, 10) + 1)
{
	if(isset($day[$i]))
		$var = $var . $day[$i].",";
	
}

$cant = strlen($var);
$dayData =  substr($var,0,$cant-1);


 $horaInicio24  = date("H:i", strtotime($horaInicio));
 $horaFin24  = date("H:i", strtotime($horaFin));
 
 
 if($dayData != "")
 {
    if
    (
            ($correo != null) && ($dayData != null) && ($celular != null) && ($nombre != null) && ($apellidoPaterno != null) &&
            ($comentarios != null) && ($horaInicio24 != null) && ($horaFin24 != null) && ($idProducto != null)
    )
    {

            $prospecto = new usuario();
            $prospecto->prospecto(addslashes($correo),  addslashes($dayData),addslashes($celular),addslashes($nombre),addslashes($apellidoPaterno),addslashes($comentarios), addslashes($horaInicio24), addslashes($horaFin24), $idProducto);
    }

 }

?>