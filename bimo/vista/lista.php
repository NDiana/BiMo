<?php
if(empty($_POST["id_rol"])){
    // Si no se definió $id_rol... grave error!
    // Este error se muestra sí o sí (ya que no es un error de mysql)
    die("<script type='text/javascript'>
        alert('Acceso denegado');
        window.location='http://bimoprueba.epizy.com/bimo/vista/pag_administrador.php';
    </script>");
}
?>

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

<!-- Titulo y opciones principales !-->

<?php 
    $cadena = $_SESSION['Administrador'];
        
    $parte = explode(" ",$cadena); 
?>

<br><br>

<center>

<table border="0" style="width: 99%;">
    <tr>
        <td style="width: 50%;">
            <img src="../uploads/logo.png" style="width: 70%;">
        </td>
        <td style="width: 20%;">
            <div class="form-group">
                <select name="forma" onchange="location = this.value;" class="form-control" disabled />
                    <option>
                        Bienvenido(a) <?php echo utf8_decode(strtoupper($parte[0]));?>
                    </option>
                </select>
            </div>
        </td>
    </tr>
</table>

</center>

<br>

<!-- Imagen linea horizontal de colores !-->

<img src="../uploads/linea.png" width="100%">

<!-- Opciones de administrador !-->

<h1 class="page-header" style="color: #534949;">Lista de Usuarios Registrados 
    <font face="Arial" size="5">
        (
            <?php echo $_POST["id_rol"] == 1 ? 'Administradores' : ''; ?>
            <?php echo $_POST["id_rol"] == 2 ? 'Supervisores' : ''; ?>
            <?php echo $_POST["id_rol"] == 3 ? 'Guardas de seguridad' : ''; ?>
            <?php echo $_POST["id_rol"] == 4 ? 'Usuarios comunes' : ''; ?>
        )
    </font>
</h1>

<ol class="breadcrumb">
  <li><a href="http://bimoprueba.epizy.com/bimo/vista/pag_administrador.php" style="color: #1CA794;"><span class="icon-undo"></span> Volver atrás</a></li>
</ol>

<table id="myTable" class="table table-striped" style="width: 100%; font-size: 13px;">
    <thead>
        <tr>
            <th style="color: #534949;">

                Número de documento 

                <br><br>
            </th>
            <th style="color: #534949;">

                Tipo de documento 

                <br><br>
            </th>
            <th style="color: #534949;">
                
                Nombres y apellidos 

                <br><br>
            </th>
            <th style="color: #534949;">

                Centro de formación 

                <br><br>
            </th>
            <th style="color: #534949;">

                Rol de usuario 

                <br><br>
            </th>
            <th style="color: #534949;">

                Ficha de formación 

                <br><br>
            </th>
            <th style="color: #534949;">

                Contacto 

                <br><br>
            </th>
            <th style="color: #534949;">

                Correo electrónico 

                <br><br>
            </th>
            <th style="color: #534949;">

                Estado 

                <br><br>
            </th>
            <th style="color: #534949;"></th>
        </tr>
    </thead>
    
    <?php foreach($this->model->Listar($_POST["id_rol"]) as $r): ?>
        <tr>
            <td><?php echo $r->__GET('no_documento'); ?></td>
            <td><?php echo $r->__GET('tipo_documento'); ?></td>
            <td><?php echo strtoupper($r->__GET('nombre')); ?></td>
            <td><?php echo strtoupper($r->__GET('centro')); ?></td>
            <td><?php echo $r->__GET('rol'); ?></td>
            <td><?php echo strtoupper($r->__GET('no_ficha')); ?></td>
            <td><?php echo $r->__GET('celular'); ?></td>
            <td><?php echo strtoupper($r->__GET('correo')); ?></td>
            <td><?php echo $r->__GET('estado'); ?></td>
            <td>
                <a class="btn" style="color: #1CA794;" title="Actualizar" href="?c=Controlador&a=Crud&id=<?php echo $r->id; ?>"><span class="icon-pencil"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
}
?>
