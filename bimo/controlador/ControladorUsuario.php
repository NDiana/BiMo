<?php

require_once '../modelo/Usuario.php';

require_once '../modelo/Conexion.php';

class ControladorUsuario
{
	/* Atributos */

	private $model;

	/* Constructor */

	public function __CONSTRUCT()
	{
        $this->model = new Usuario();
    }

    public function Perfil()
    {
        require_once '../vista/usuario.php';
    }

    public function Ver()
    {
        require_once '../vista/formulario.php';
    }

    public function VerDos()
    {
        require_once '../vista/verificar.php';
    }

    public function Verificar()
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
            $correo = $_POST['correo'];

            $documento = $_POST['no_documento'];

                echo '<form id="frm-alumno" action="pag_formulario.php" method="post" enctype="multipart/form-data">
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <label style="color: #534949;">Número de documento</label>
                                <input style="width: 90%;" type="text" pattern="[0-9]{8,11}" onkeypress="return soloNumeros(event)" name="documento" class="form-control" title="No se aceptan letras ni simbolos, minimo 8 números - maximo 11 números aceptados" placeholder="Escribe aqui" value="echo $documento;" required/>
                            </td>
                            <td>
                                <label style="color: #534949;">Correo electrónico</label>
                                <input style="width: 90%;" type="text" name="correo" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@misena.edu.co" title="Por favor introduzca la dirección de correo electrónico requerida. Ejemplo: tucuenta@misena.edu.co" placeholder="Escribe aqui" required/>
                            </td>
                        </tr>
                    </table>
                </form>';

            echo "<script type='text/javascript'>
                alert('La cuenta de correo electrónico y el número de documento no estan en uso; proceda a registrarse por favor');
                window.location='http://bimoprueba.epizy.com/bimo/vista/pag_formulario.php';

                document.miforum.submit();
            </script>";
        }
        else{} if ($rtaDocumento = mysql_fetch_array($comprobarDocumento)) 
        {
            echo"<script type='text/javascript'>
                alert('El número de documento que acaba de ingresar actualmente esta en uso');
                window.location='http://bimoprueba.epizy.com/bimo/vista/pag_verificar.php';
            </script>";
        }
        else{} if ($rtaEmail = mysql_fetch_array($comprobarEmail)) 
        {
            echo"<script type='text/javascript'>
                alert('La cuenta de correo electrónico que acaba de ingresar actualmente esta en uso');
                window.location='http://bimoprueba.epizy.com/bimo/vista/pag_verificar.php';
            </script>";    
        }
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
            $alm = new Usuario();

            $alm->__SET('fecha_registro',       $_POST['fecha_registro']);
            $alm->__SET('nombre',               $_POST['nombre']);
            $alm->__SET('tipo_documento',       $_POST['tipo_documento']);
            $alm->__SET('no_documento',         $_POST['no_documento']);
            $alm->__SET('centro',               $_POST['centro']);
            $alm->__SET('rol',                  4);
            $alm->__SET('no_ficha',             $_POST['no_ficha']);
            $alm->__SET('fecha_inicio',         $_POST['fecha_inicio']);
            $alm->__SET('fecha_terminacion',    $_POST['fecha_terminacion']);
            $alm->__SET('celular',              $_POST['celular']);
            $alm->__SET('correo',               $_POST['correo']);
            $alm->__SET('contrasena',           $_POST['pass']);
            $alm->__SET('estado',               2);

            $this->model->Registrar($alm);

            echo "<script type='text/javascript'>
                alert('Se ha registrado correctamente al sistema');
                window.location='http://bimoprueba.epizy.com/bimo/index.php';
            </script>";
        }
        else{} if ($rtaDocumento = mysql_fetch_array($comprobarDocumento)) 
        {
            echo"<script type='text/javascript'>
                alert('El número de documento que acaba de ingresar actualmente esta en uso, por favor intente registrarse nuevamente');
                window.location='http://bimoprueba.epizy.com/bimo/vista/pag_formulario.php';
            </script>";
        }
        else{} if ($rtaEmail = mysql_fetch_array($comprobarEmail)) 
        {
            echo"<script type='text/javascript'>
                alert('La cuenta de correo electrónico que acaba de ingresar actualmente esta en uso, por favor intente registrarse nuevamente');
                window.location='http://bimoprueba.epizy.com/bimo/vista/pag_formulario.php';
            </script>";    
        }
    }
}

?>