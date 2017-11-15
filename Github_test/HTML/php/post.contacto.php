<?php
session_start();

if(
        !isset($_SESSION['nombre'])  || 
        !isset($_SESSION['apellidoPaterno']) ||
        !isset($_SESSION['celular']) ||
        !isset($_SESSION['correoElectronico'])
    )
{
    session_start();
}
if(isset($_SESSION['nombre']))
{
    $nombre = $_SESSION['nombre'];
}
else
{
    $nombre = "";
}
if(isset($_SESSION['apellidoPaterno']))
{
    $apellidoPaterno = $_SESSION['apellidoPaterno'];
}
else
{
    $apellidoPaterno = "";
}
if(isset($_SESSION['celular']))
{
    $celular = $_SESSION['celular'];
}
else
{
    $celular = "";
}
if(isset($_SESSION['correoElectronico']))
{
    $correoElectronico = $_SESSION['correoElectronico'];
}
else
{
    $correoElectronico = "";
}

