<?php

require_once '../modelo/Parqueadero.php';

require_once '../modelo/Conexion.php';

class ControladorParqueadero
{
	/* Atributos */

	private $model;

	/* Constructor */

	public function __CONSTRUCT()
	{
        $this->model = new Parqueadero();
    }

    public function Lista()
    {
        require_once '../vista/header.php';
        require_once '../vista/administrador.php';
        require_once '../vista/footer.php';
    }
}

?>