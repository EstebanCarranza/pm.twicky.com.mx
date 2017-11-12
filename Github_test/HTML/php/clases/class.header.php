<?php
require_once 'class.functions.php';
require_once 'class.usuario.php';

class header
{
    public function logout()
    {
        $fun = new funciones();
        $fun->session(false, true, 'login.php','');
    }
    public function validar_sesion()
    {
        $fun = new funciones();
        $fun->session(true, true, 'login.php', '');
        if(!isset($_SESSION['nombreUsuario']))
        {
            $this->logout();
        }
        else 
        {
            $nombre = $_SESSION['nombreUsuario'];
        }
        
        
        return $nombre;
    }

   
}

 

  
 