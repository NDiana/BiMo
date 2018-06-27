<?php
session_start();

require_once("Conexion.php");

class Login
{
	//Acceso Administrador

	public function Administrador()
	{
		$correo = $_POST['correo'];
		$pass = md5($_POST['pass']);

		$query = "SELECT 
		* 
		FROM
		usuario
		WHERE correo='".strip_tags($correo)."' 
		AND
		contrasena='".strip_tags($pass)."'
		AND
		rol='".strip_tags(1)."'
		AND
		estado!='".strip_tags(3)."';";
		
		$resultado = mysql_query($query,Conexion::Conectar());
		
		if ($reg=mysql_num_rows($resultado) == 0)
		{
			header("Location:http://bimoprueba.epizy.com/bimo/vista/login_administrador.php?e=login");
		}else{
			
		}
		if($reg=mysql_fetch_array($resultado))
		{
			$_SESSION['Administrador'] = $reg['nombre'];
			$_SESSION['id_a'] = $reg['id'];

			header("Location:http://bimoprueba.epizy.com/bimo/vista/pag_administrador.php");
		}
	}

	//Acceso Supervisor

	public function Supervisor()
	{
		$correo = $_POST['correo'];
		$pass = md5($_POST['pass']);

		$query = "SELECT 
		* 
		FROM
		usuario
		WHERE correo='".strip_tags($correo)."' 
		AND
		contrasena='".strip_tags($pass)."'
		AND
		rol='".strip_tags(2)."'
		AND
		estado!='".strip_tags(3)."';";
		
		$resultado = mysql_query($query,Conexion::Conectar());
		
		if ($reg=mysql_num_rows($resultado) == 0)
		{
			header("Location:http://bimoprueba.epizy.com/bimo/vista/login_supervisor.php?e=login");
		}else{
			
		}
		if($reg=mysql_fetch_array($resultado))
		{
			$_SESSION['Supervisor'] = $reg['nombre'];
			$_SESSION['id_s'] = $reg['id'];

			header("Location:http://bimoprueba.epizy.com/bimo/vista/pag_supervisor.php");
		}
	}

	//Acceso Guarda

	public function Guarda()
	{
		$correo = $_POST['correo'];
		$pass = md5($_POST['pass']);

		$query = "SELECT 
		* 
		FROM
		usuario
		WHERE correo='".strip_tags($correo)."' 
		AND
		contrasena='".strip_tags($pass)."'
		AND
		rol='".strip_tags(3)."'
		AND
		estado!='".strip_tags(3)."';";
		
		$resultado = mysql_query($query,Conexion::Conectar());
		
		if ($reg=mysql_num_rows($resultado) == 0)
		{
			header("Location:http://bimoprueba.epizy.com/bimo/vista/login_guarda.php?e=login");
		}else{
			
		}
		if($reg=mysql_fetch_array($resultado))
		{
			$_SESSION['Guarda'] = $reg['nombre'];
			$_SESSION['id_g'] = $reg['id'];

			header("Location:http://bimoprueba.epizy.com/bimo/vista/pag_guarda.php");
		}
	}

	//Acceso Usuario común

	public function Usuario()
	{
		$correo = $_POST['correo'];
		$pass = md5($_POST['pass']);

		$query = "SELECT 
		* 
		FROM
		usuario
		WHERE correo='".strip_tags($correo)."' 
		AND
		contrasena='".strip_tags($pass)."'
		AND
		rol='".strip_tags(4)."'
		AND
		estado!='".strip_tags(3)."';";
		
		$resultado = mysql_query($query,Conexion::Conectar());
		
		if ($reg=mysql_num_rows($resultado) == 0)
		{
			header("Location:index.php?e=login");
		}else{
			
		}
		if($reg=mysql_fetch_array($resultado))
		{
			$_SESSION['Usuario'] = $reg['nombre'];
			$_SESSION['id_u'] = $reg['id'];

			header("Location:http://bimoprueba.epizy.com/bimo/vista/pag_usuario.php");
		}
	}
}
?>
