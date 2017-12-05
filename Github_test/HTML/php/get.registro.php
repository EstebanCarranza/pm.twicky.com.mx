<?php

if(!isset($_SESSION['tokenOK']))
{
    session_start();
 
    if($_SESSION['tokenOK'] <> "OK")
    {
        echo "<script> window.location='../'; </script>";
    }
}

if(isset($_GET['mensaje']))	
{
    $mensaje = $_GET['mensaje']; 
}
else 
{
    $mensaje = "";
}

if(!isset($_SESSION['msg-body-correo']))
{
    $MSG_Correo = "";
    echo "<script> window.location='../'; </script>";
}
else 
{
    $MSG_Correo = $_SESSION['msg-body-correo'];
}

   
 