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

<?php require '../vista/header.php'; ?>

<br>

<h1 style="color: #534949;">Registro de Usuario</h1>

<br>

<form id="frm-alumno" action="?c=Controlador&a=Crear" method="post" enctype="multipart/form-data">

    <input name="fecha_registro" class="form-control" type="hidden" value="<?php echo date("Y-m-d"); ?>"/>
    
    <div class="form-group">
        <label style="color: #534949;">Nombres y apellidos</label>
        <input type="text" onkeypress="return soloLetras(event)" name="nombre" class="form-control" title="No se aceptan números ni simbolos" placeholder="Vacío" required/>
    </div>
    
    <div class="form-group">
        <label style="color: #534949;">Tipo de documento</label><br>
        <label style="color: #534949;">Cédula de ciudadania (1), Tarjeta de identidad (2), Cédula extranjera (3)</label>
        <input type="text" pattern="[1-3]{1}" onkeypress="return soloNumeros(event)" name="tipo_documento" class="form-control" title="No se aceptan letras ni simbolos, minimo 1 número - maximo 1 número aceptados" placeholder="Introduzca el número que corresponda al tipo de documento que desea registrar" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Número de documento</label>
        <input type="text" pattern="[0-9]{8,11}" onkeypress="return soloNumeros(event)" name="no_documento" class="form-control" title="No se aceptan letras ni simbolos, minimo 8 números - maximo 11 números aceptados" placeholder="Vacío" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Centro de formación</label>
        <input type="text" onkeypress="return soloLetras(event)" name="centro" class="form-control" title="No se aceptan números ni simbolos" placeholder="Vacío" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Rol de usuario</label><br>
        <label style="color: #534949;">Administrador (1), Supervisor (2), Guarda de seguridad (3), Usuario común (4)</label>
        <input type="text" pattern="[1-4]{1}" onkeypress="return soloNumeros(event)" name="rol" class="form-control" title="No se aceptan letras ni simbolos, minimo 1 número - maximo 1 número aceptados" placeholder="Introduzca el número que corresponda al rol que desea registrar" required/>
    </div>

    <input type="hidden" name="no_ficha" value="sin definir" class="form-control"/>    

    <input type="hidden" name="fecha_inicio" value="sin definir" class="form-control"/>

    <input type="hidden" name="fecha_terminacion" value="sin definir" class="form-control"/>
      
    <div class="form-group">
        <label style="color: #534949;">Telefono celular</label>
        <input type="text" pattern="[0-9]{10}" onkeypress="return soloNumeros(event)" name="celular" class="form-control" title="No se aceptan letras ni simbolos, minimo 10 números - maximo 10 números aceptados" placeholder="Vacío" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Correo electrónico</label>
        <input type="text" name="correo" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@misena.edu.co" title="Por favor introduzca la dirección de correo electrónico requerida. Ejemplo: tucuenta@misena.edu.co" placeholder="Vacío" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Contraseña</label>
        <input type="password" name="pass" class="form-control" title="Para mayor seguridad su contraseña debe contener (Letras, números y simbolos) - Caracteres minimos aceptados (8) - Simbolos aceptados por el sistema(¿?=$#/_-)" pattern="[a-zA-Z0-9_¿?=$#/_-]{8,50}" placeholder="Vacío" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Estado</label><br>
        <label style="color: #534949;">Habilitado (1), Pendiente (2), Inhabilitado (3)</label>
        <input type="text" pattern="[1-2]{1}" onkeypress="return soloNumeros(event)" name="estado" class="form-control" title="No se aceptan letras ni simbolos, minimo 1 número - maximo 1 número aceptados" placeholder="Introduzca el número que corresponda al estado que desea registrar" required/>
    </div>

    <br>
    
    <div class="text-center">
        <button class="btn btn-success" type="submit">Crear cuenta</button>
    </div>

    <br>
</form>

<div class="text-center">
    <a class="btn" href="http://bimoprueba.epizy.com/bimo/vista/pag_administrador.php">Cancelar operación</a>
</div>

<br><br>

<?php require '../vista/footer.php'; ?>

<?php
}
?>