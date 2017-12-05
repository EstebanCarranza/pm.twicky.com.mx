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

if
(
    !isset($_SESSION['mensaje']) || 
    !isset($_SESSION['msg-title-correo']) || 
    !isset($_SESSION['msg-body-correo']) ||
    !isset($_SESSION['msg-header-correo'])
)
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
    $_SESSION['msg-header-correo'] = "¡Bienvenido a twicky!";
    $_SESSION['msg-title-correo'] = "Introduce tu correo para continuar con el proceso de registro";
    $_SESSION['msg-body-correo'] = "";
}

if($correo != null)
{
    $token = new usuario();
    $token->token($correo);
}
class DataCorreo
{
    public function __construct() {
        
    }
    function get_titles()
    {
        $MSG_Header = $_SESSION['msg-header-correo'];
        $MSG_Title = $_SESSION['msg-title-correo'];
        $MSG_Mensaje = $_SESSION['mensaje'];
        echo "
            <h1 id='login-title'><strong>$MSG_Header</strong></h1>
            <h3 id='login-title'><strong>$MSG_Title</strong></h3>
            <h4 id='login-title'><strong>$MSG_Mensaje</strong></h4>                
        ";
    }
    function get_input_()
    {
        $correoX = $_SESSION['msg-body-correo'];
        echo "<input type='email' name='form-email' value='$correoX' placeholder='Correo...' class='form-email form-control' id='form-email' required>";
    }
};