<?php

if(!isset($_SESSION['mensaje']))
{
    session_start();
    $_SESSION['mensaje'] = "";
}

if(!isset($_GET['r']))
{
    $_SESSION['mensaje'] = "";
}
