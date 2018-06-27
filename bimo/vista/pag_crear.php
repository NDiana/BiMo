<?php
require_once '../controlador/ControladorAdministrador.php';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])){
    $controller = new ControladorAdministrador();
    $controller->Ver();    
} else {
    
    // Obtenemos el controlador que queremos cargar
    $controller = $_REQUEST['c'] . 'Administrador';
    $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Ver';
    
    
    // Instanciamos el controlador
    $controller = new $controller();
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}

?>