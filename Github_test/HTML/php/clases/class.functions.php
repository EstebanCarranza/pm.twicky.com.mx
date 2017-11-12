<?php
//call sp_listaSolicitudes('ASC',0,10);
require_once 'modelo.php';

class funciones
{
	function __construct()
	{
		
	}
	
	function session($start_destroy, $pag_redirect, $pag_to_redirect, $pag_message)
	{
		if($start_destroy)
		{
			
                        
                        if
			(
				(!isset($_SESSION['idUsuario']))        ||
				(!isset($_SESSION['tipoUsuario']))      ||
                                (!isset($_SESSION['nombreUsuario']))
			)
			{
                            /*
				session_unset();
				session_destroy();
				if($pag_redirect)
                                    header("Location: $pag_to_redirect");
                             * */
                            session_start();  
                            
			}

		}
		else
		{
			if(session_start())
			{
				session_unset();
			session_destroy();
			}
			
			if($pag_redirect)
				header("Location: $pag_to_redirect");
		}
	}
	
}
?>