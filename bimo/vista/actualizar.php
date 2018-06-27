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

<h1 class="page-header" style="color: #534949;">
    <?php echo $alm->__GET('id') != null ? strtoupper($alm->__GET('nombre')) : ''; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="http://bimoprueba.epizy.com/bimo/vista/pag_administrador.php" style="color: #1CA794;"><span class="icon-cancel-circle"></span> Cancelar actualización</a></li>
  <li class="active"><?php echo $alm->__GET('id') != null ? strtoupper($alm->__GET('nombre')) : ''; ?></li>
</ol>

<form id="frm-alumno" action="?c=Controlador&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
    
    <div class="form-group">
        <label style="color: #534949;">Fecha de registro</label>
        <input type="text" name="fecha_registro" value="<?php echo strtoupper($alm->__GET('fecha_registro')); ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label style="color: #534949;">Nombres y apellidos</label>
        <input type="text" onkeypress="return soloLetras(event)" name="nombre" value="<?php echo strtoupper($alm->__GET('nombre')); ?>" class="form-control" title="No se aceptan números ni simbolos" required/>
    </div>
    
    <div class="form-group">
        <label style="color: #534949;">Tipo de documento</label>
        <select name="tipo_documento" class="form-control" disabled />
            <option <?php echo $alm->__GET('tipo_documento') == 1 ? 'selected' : ''; ?> value="1">Cédula de ciudadania</option>
            <option <?php echo $alm->__GET('tipo_documento') == 2 ? 'selected' : ''; ?> value="2">Tarjeta de identidad</option>
            <option <?php echo $alm->__GET('tipo_documento') == 3 ? 'selected' : ''; ?> value="3">Cédula extranjera</option>
        </select>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Número de documento</label>
        <input type="text" name="no_documento" value="<?php echo $alm->__GET('no_documento'); ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label style="color: #534949;">Centro de formación</label>
        <input type="text" onkeypress="return soloLetras(event)" name="centro" value="<?php echo strtoupper($alm->__GET('centro')); ?>" class="form-control" title="No se aceptan números ni simbolos" required/>
    </div>    

    <div class="form-group">
        <label style="color: #534949;">Rol de usuario</label>
        <select name="rol" class="form-control">
            <option <?php echo $alm->__GET('rol') == 1 ? 'selected' : ''; ?> value="1">Administrador</option>
            <option <?php echo $alm->__GET('rol') == 2 ? 'selected' : ''; ?> value="2">Supervisor</option>
            <option <?php echo $alm->__GET('rol') == 3 ? 'selected' : ''; ?> value="3">Guarda de seguridad</option>
            <option <?php echo $alm->__GET('rol') == 4 ? 'selected' : ''; ?> value="4">Usuario común</option>
        </select>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Número de ficha</label>
        <input type="text" name="no_ficha" value="<?php echo strtoupper($alm->__GET('no_ficha')); ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label style="color: #534949;">Fecha inicio de formación</label>
        <input type="text" name="fecha_inicio" value="<?php echo strtoupper($alm->__GET('fecha_inicio')); ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label style="color: #534949;">Fecha terminación de formación</label>
        <input type="text" name="fecha_terminacion" value="<?php echo strtoupper($alm->__GET('fecha_terminacion')); ?>" class="form-control" disabled />
    </div>
    
    <div class="form-group">
        <label style="color: #534949;">Telefono celular</label>
        <input type="text" pattern="[0-9]{10}" onkeypress="return soloNumeros(event)" name="celular" value="<?php echo $alm->__GET('celular'); ?>" class="form-control" title="No se aceptan letras ni simbolos, minimo 10 números - maximo 10 números aceptados" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Correo electrónico</label>
        <input type="text" name="correo" value="<?php echo $alm->__GET('correo'); ?>" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@misena.edu.co" title="Por favor introduzca la dirección de correo electrónico requerida. Ejemplo: tucuenta@misena.edu.co" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Estado</label>
        <select name="estado" class="form-control">
            <option <?php echo $alm->__GET('estado') == 1 ? 'selected' : ''; ?> value="1">Habilitado</option>
            <option <?php echo $alm->__GET('estado') == 2 ? 'selected' : ''; ?> value="2">Pendiente</option>
            <option <?php echo $alm->__GET('estado') == 3 ? 'selected' : ''; ?> value="3">Inhabilitado</option>
        </select>
    </div>

    <br>
    
    <div class="text-center">
        <button class="btn btn-success" type="submit">Actualizar</button>
    </div>

    <br>
</form>

<?php
}
?>