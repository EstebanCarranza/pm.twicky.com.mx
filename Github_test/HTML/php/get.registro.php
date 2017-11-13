<?php

if(!isset($_SESSION['tokenOK']))
{
    session_start();
 
    if($_SESSION['tokenOK'] <> "OK")
    {
        echo "<script> window.location='../'; </script>";
    }
}
 
    
   
 