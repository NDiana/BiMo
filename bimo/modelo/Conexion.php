<?php
class Conexion
{
	public static function Conectar()
	{
		$conexion = mysql_connect("sql212.epizy.com","epiz_21842634","CGrU5F9xXpDg");

		mysql_query("SET NAMES 'utf8'");

		mysql_select_db("epiz_21842634_bimo");
		
		return $conexion;
	}
}
?>
