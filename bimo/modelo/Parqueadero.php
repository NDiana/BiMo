<?php

class Parqueadero
{
	/* Atributos */

	private $id_parqueadero;
	private $nombre_parqueadero;
	private $capacidad_parqueadero;

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

	public function __GET($a)
	{ 
		return $this->$a; 
	}	

	/* Métodos SET */

	public function __SET($a, $b)
	{ 
		return $this->$a = $b;
	}

	/* Métodos de operación */

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM parqueadero");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Parqueadero();

				$alm->__SET('id_parqueadero', $r->id_parqueadero);
				$alm->__SET('nombre_parqueadero', $r->nombre_parqueadero);
				$alm->__SET('capacidad_parqueadero', $r->capacidad_parqueadero);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}

?>