<?php require '../vista/header.php'; ?>

<br>

<h1 style="color: #534949;">Registrarse ( Datos personales )</h1>

<br>

<form id="frm-alumno" action="?c=Controlador&a=Crear" method="post" enctype="multipart/form-data">

    <input name="fecha_registro" class="form-control" type="hidden" value="<?php echo date("Y-m-d"); ?>"/>
    
    <div class="form-group">
        <label style="color: #534949;">Nombres y apellidos</label>
        <input type="text" onkeypress="return soloLetras(event)" name="nombre" class="form-control" title="No se aceptan números ni simbolos" placeholder="Vacío" required/>
    </div>
    
    <div class="form-group">
        <label style="color: #534949;">Tipo de documento</label><br><br>

        <input type="radio" required name="tipo_documento" id="r1" value="1"><label style="color: #534949;" for="r1">&nbsp Cédula de ciudadania &nbsp &nbsp</label>

        <input type="radio" required name="tipo_documento" id="r2" value="2"><label style="color: #534949;" for="r2">&nbsp Tarjeta de identidad &nbsp &nbsp</label>

        <input type="radio" required name="tipo_documento" id="r3" value="3"><label style="color: #534949;" for="r3">&nbsp Cédula extranjera</label>
    </div><br>

    <div class="form-group">
        <label style="color: #534949;">Número de documento</label>
        <input type="text" pattern="[0-9]{8,11}" onkeypress="return soloNumeros(event)" name="no_documento" class="form-control" title="No se aceptan letras ni simbolos, minimo 8 números - maximo 11 números aceptados" placeholder="Vacío" value="<?php echo $_POST['documento']; ?>" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Centro de formación</label>
        <input type="text" onkeypress="return soloLetras(event)" name="centro" class="form-control" title="No se aceptan números ni simbolos" placeholder="Vacío" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Ficha de formación</label>
        <input type="text" onkeypress="return soloNumeros(event)" name="no_ficha" class="form-control" title="No se aceptan letras ni simbolos" placeholder="Vacío" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Fecha inicio de formación</label>
        <input type="date" value="Y-m-d" name="fecha_inicio" class="form-control" required/>
    </div>

    <div class="form-group">
        <label style="color: #534949;">Fecha terminación de formación</label>
        <input type="date" name="fecha_terminacion" class="form-control" required/>
    </div>
    
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

    <br>
    
    <div class="text-center">
        <button class="btn btn-success" type="submit">Crear cuenta</button>
    </div>

    <br>
</form>

<div class="text-center">
    <a class="btn" href="http://bimoprueba.epizy.com/bimo/index.php">Cancelar operación</a>
</div>

<br><br>

<?php require '../vista/footer.php'; ?>