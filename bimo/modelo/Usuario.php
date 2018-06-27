<?php

require_once '../modelo/Persona.php';

class Usuario extends Persona
{
	/* Atributos */

	

	/* Constructor */
	
	

	/* Métodos de operación */

	public function Perfil($id_u)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE id = $id_u");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Usuario();

				$alm->__SET('id', $r->id);
				$alm->__SET('fecha_registro', $r->fecha_registro);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('tipo_documento', $r->tipo_documento);
                $alm->__SET('no_documento', $r->no_documento);
                $alm->__SET('centro', $r->centro);
                $alm->__SET('rol', $r->rol);
                $alm->__SET('no_ficha', $r->no_ficha);
                $alm->__SET('fecha_inicio', $r->fecha_inicio);
                $alm->__SET('fecha_terminacion', $r->fecha_terminacion);
				$alm->__SET('celular', $r->celular);
				$alm->__SET('correo', $r->correo);
				$alm->__SET('estado', $r->estado);

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