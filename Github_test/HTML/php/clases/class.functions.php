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
			
			session_start();
			if
			(
				(!isset($_SESSION['idUsuario'])) ||
				(!isset($_SESSION['tipoUsuario']))
			)
			{
				session_unset();
				session_destroy();
				if($pag_redirect)
				echo "<script> alert('$pag_message'); window.location = '$pag_to_redirect'; </script>";
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
				echo "<script> window.location = '$pag_to_redirect'; </script>";
		}
	}
	
}
?>