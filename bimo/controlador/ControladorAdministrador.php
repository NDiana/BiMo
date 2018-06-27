<?php

require_once '../modelo/Administrador.php';

require_once '../modelo/Conexion.php';

class ControladorAdministrador
{
	/* Atributos */

	private $model;

	/* Constructor */

	public function __CONSTRUCT()
	{
        $this->model = new Administrador();
    }

    public function Lista()
    {
        require_once '../vista/header.php';
        require_once '../vista/lista.php';
        require_once '../vista/footer.php';
    }

    public function Crud(){
        $alm = new Administrador();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once '../vista/header.php';
        require_once $alm->id > 0 
                        ? '../vista/actualizar.php' 
                        : ''
                        ;
        require_once '../vista/footer.php';
    }

    public function Guardar()
    {
        $alm = new Administrador();
        
        $alm->__SET('id',                   $_REQUEST['id']);
        $alm->__SET('nombre',               $_REQUEST['nombre']);
        $alm->__SET('centro',               $_REQUEST['centro']);
        $alm->__SET('rol',                  $_REQUEST['rol']);
        $alm->__SET('celular',              $_REQUEST['celular']);
        $alm->__SET('correo',               $_REQUEST['correo']);
        $alm->__SET('estado',               $_REQUEST['estado']);

        $this->model->Actualizar($alm);
              
        echo "<script type='text/javascript'>
            alert('Registro actualizado');
            window.location='http://bimoprueba.epizy.com/bimo/vista/pag_administrador.php';
        </script>";
    }

    public function Ver()
    {
        require_once '../vista/crear.php';
    }

    public function Crear()
    {
        /* Comprobando si el número de documento esta registrado */

        $no_documento = "SELECT * FROM usuario WHERE no_documento='".strip_tags($_POST['no_documento'])."';";
                
        $comprobarDocumento = mysql_query($no_documento,Conexion::Conectar());

        /* Comprobando si el correo electrónico esta registrado */

        $email = "SELECT * FROM usuario WHERE correo='".strip_tags($_POST['correo'])."';";
                
        $comprobarEmail = mysql_query($email,Conexion::Conectar());

        /* Comprobando si el número de documento y el correo electrónico estan registrados */

        if ($rtaDocumento = mysql_num_rows($comprobarDocumento) == 0 && $rtaEmail = mysql_num_rows($comprobarEmail) == 0)
        {
            $alm = new Administrador();

            $alm->__SET('fecha_registro',       $_POST['fecha_registro']);
            $alm->__SET('nombre',               $_POST['nombre']);
            $alm->__SET('tipo_documento',       $_POST['tipo_documento']);
            $alm->__SET('no_documento',         $_POST['no_documento']);
            $alm->__SET('centro',               $_POST['centro']);
            $alm->__SET('rol',                  $_POST['rol']);
            $alm->__SET('no_ficha',             $_POST['no_ficha']);
            $alm->__SET('fecha_inicio',         $_POST['fecha_inicio']);
            $alm->__SET('fecha_terminacion',    $_POST['fecha_terminacion']);
            $alm->__SET('celular',              $_POST['celular']);
            $alm->__SET('correo',               $_POST['correo']);
            $alm->__SET('contrasena',           $_POST['pass']);
            $alm->__SET('estado',               $_POST['estado']);

            $this->model->Registrar($alm);

            echo "<script type='text/javascript'>
                alert('Registro añadido exitosamente');
                window.location='http://bimoprueba.epizy.com/bimo/vista/pag_administrador.php';
            </script>";
        }
        else{} if ($rtaDocumento = mysql_fetch_array($comprobarDocumento)) 
        {
            echo"<script type='text/javascript'>
                alert('El número de documento que acaba de ingresar actualmente esta en uso, por favor intente registrarse nuevamente');
                window.location='http://bimoprueba.epizy.com/bimo/vista/pag_crear.php';
            </script>";
        }
        else{} if ($rtaEmail = mysql_fetch_array($comprobarEmail)) 
        {
            echo"<script type='text/javascript'>
                alert('La cuenta de correo electrónico que acaba de ingresar actualmente esta en uso, por favor intente registrarse nuevamente');
                window.location='http://bimoprueba.epizy.com/bimo/vista/pag_crear.php';
            </script>";    
        }        
    }
}

?>