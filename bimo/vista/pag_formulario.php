<?php
require_once '../controlador/ControladorUsuario.php';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])){
    $controller = new ControladorUsuario();
    $controller->Ver();    
} else {
    
    // Obtenemos el controlador que queremos cargar
    $controller = $_REQUEST['c'] . 'Usuario';
    $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Ver';
    
    
    // Instanciamos el controlador
    $controller = new $controller();
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}

?>