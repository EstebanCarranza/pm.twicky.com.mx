<?php
require_once 'clases/class.usuario.php';
if(isset($_GET['token']))
{
    $token = $_GET['token'];
    if($token != null || $token != "")
    {
        $validarToken = new usuario();
        $validarToken->validarToken($token);
    }
      
}