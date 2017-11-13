<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'clases/class.usuario.php';
if(!isset($_POST['form-email']))
{
    $correo = null;
}
else
{
    $correo = $_POST['form-email'];
}

if(!isset($_SESSION['mensaje']))
{
    session_start();
    $mensaje = "";
}
else
{
    $mensaje = $_SESSION['mensaje'];
    //$mensaje = "<h4 id='login-title'><strong>$mensaje</strong></h4>";
}
if(!isset($_GET['r']))
{
    $_SESSION['mensaje'] = "";
}

if($correo != null)
{
    $token = new usuario();
    $token->token($correo);
}