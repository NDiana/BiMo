<?php require_once("../modelo/Login.php");
if(!isset($_SESSION["Usuario"]))
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
require_once '../controlador/ControladorUsuario.php';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])){
    $controller = new ControladorUsuario();
    $controller->Perfil();    
} else {
    
    // Obtenemos el controlador que queremos cargar
    $controller = $_REQUEST['c'] . 'Usuario';
    $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Perfil';
    
    
    // Instanciamos el controlador
    $controller = new $controller();
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}

?>

<?php
}
?>