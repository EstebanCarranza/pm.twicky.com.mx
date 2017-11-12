<?php

require_once 'clases/class.header.php';

$header = new header();

$nombre = $header->validar_sesion();

if(isset($_POST['logout']))
{
    $header->logout();
}