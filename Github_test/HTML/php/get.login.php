<?php

    session_start();    



if(!isset($_SESSION['mensaje']))
{
    $_SESSION['mensaje'] = "";
}
if(!isset($_SESSION['correoLog']))
{
    $_SESSION['correoLog'] = "";
}
if(!isset($_GET['r']))
{
    $_SESSION['mensaje'] = "";
    $_SESSION['correoLog'] = "";
}
