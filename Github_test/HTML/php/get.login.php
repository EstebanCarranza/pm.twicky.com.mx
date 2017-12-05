<?php

    session_start();    



if(!isset($_SESSION['mensaje']))
{
    $_SESSION['mensaje'] = "";
}
if(!isset($_SESSION['msg-body-correo']))
{
    $_SESSION['msg-body-correo'] = "";
}
if(!isset($_GET['r']))
{
    $_SESSION['mensaje'] = "";
    $_SESSION['msg-body-correo'] = "";
}
