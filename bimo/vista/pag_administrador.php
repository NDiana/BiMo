<?php require_once("../modelo/Login.php");
if(!isset($_SESSION["Administrador"]))
{
?>
<script type='text/javascript'>
    alert('Acceso denegado');
    window.location='http://bimoprueba.epizy.com/bimo/index.php';
</script> 
<?php
}else{
?>

<?php
require_once '../controlador/ControladorParqueadero.php';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])){
    $controller = new ControladorParqueadero();
    $controller->Lista();    
} else {
    
    // Obtenemos el controlador que queremos cargar
    $controller = $_REQUEST['c'] . 'Parqueadero';
    $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Lista';
    
    
    // Instanciamos el controlador
    $controller = new $controller();
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}

?>

<?php
}
?>