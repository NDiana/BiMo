<?php

class Persona
{
	/* Atributos */

	private $id;
	private $fecha_registro;
	private $nombre;
	private $tipo_documento;
	private $no_documento;
	private $centro;
	private $rol;
	private $no_ficha;
	private $fecha_inicio;
	private $fecha_terminacion;
	private $celular;
	private $correo;
	private $contrasena;
	private $estado;
	
	/* Constructor */

	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=sql212.epizy.com;dbname=epiz_21842634_bimo', 'epiz_21842634', 'CGrU5F9xXpDg');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	/* Métodos GET */

	public function __GET($k)
	{ 
		return $this->$k; 
	}	

	/* Métodos SET */

	public function __SET($k, $v)
	{ 
		return $this->$k = $v;
	}

	/* Métodos de operación */

	public function Registrar(Persona $data)
	{
		try 
		{
		$sql = "INSERT INTO usuario (fecha_registro,nombre,tipo_documento,no_documento,centro,rol,no_ficha,fecha_inicio,fecha_terminacion,celular,correo,contrasena,estado) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('fecha_registro'),
				strtolower($data->__GET('nombre')), 
				$data->__GET('tipo_documento'), 
				$data->__GET('no_documento'),
				strtolower($data->__GET('centro')),
				$data->__GET('rol'),
				$data->__GET('no_ficha'),
				$data->__GET('fecha_inicio'),
				$data->__GET('fecha_terminacion'),
                $data->__GET('celular'),
                strtolower($data->__GET('correo')),
                md5($data->__GET('contrasena')),
                $data->__GET('estado'),
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Persona $data)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						nombre          	= ?, 
						centro          	= ?,
                        rol        			= ?,
                        celular        		= ?,
                        correo           	= ?,
                        estado          	= ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					strtolower($data->__GET('nombre')),
					strtolower($data->__GET('centro')),
					$data->__GET('rol'),
                    $data->__GET('celular'),
                    strtolower($data->__GET('correo')),
                    $data->__GET('estado'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM usuario WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}

?>