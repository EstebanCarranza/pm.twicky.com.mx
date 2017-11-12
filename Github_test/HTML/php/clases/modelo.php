<?php
require_once 'config.php';
class BaseDatos
{
	protected $conexion;
	protected $db;
	public $resultSet;
	public $string = "MODELO.PHP";
	private $result;
	private $link;
	
	function __construct()
	{
		
	}
	
	public function junciona()
	{
		echo $this->string;
		
	}
	
	public function abrir_conexion()
	{
		
/*
		$this->link = mysql_connect("localhost", "root", "root")
			or die('No se pudo conectar al servidor: ' . mysql_error());
									
		mysql_select_db("db_twicky_res") or die('No se pudo seleccionar la base de datos');
*/
		
		$this->link = mysql_connect("twicky.com.mx", "produccion_db", "produccion_db")
			or die('No se pudo conectar al servidor: ' . mysql_error());
									
		mysql_select_db("DB_TWICKY") or die('No se pudo seleccionar la base de datos');
	}
	
	public function dbquery($query)
	{
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		return $result;
	}
	
	public function getResultSet()
	{
		return $this->resultSet;
	}
	
	public function cerrar_conexion($freeResult, $resultX)
	{
		if($freeResult)
			// Liberar resultados
			mysql_free_result($resultX);	
		
		// Cerrar la conexión
		mysql_close($this->link);
	}
	
						
};
?>