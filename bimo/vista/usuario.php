<!DOCTYPE html>

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

<html>

<head>
	<title>Sistema de parqueadero BiMo</title>

	<meta charset="utf-8" />
        
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../fonts.css">
</head>

<body style="font-family: Arial;">

	<?php 
		$cadena = $_SESSION['Usuario'];
		
		$parte = explode(" ",$cadena); 
	?>

	<div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<!-- Titulo y opciones principales !-->

				<br><br>

				<center>

				<table border="0" style="width: 99%;">
				    <tr>
				        <td style="width: 50%;">
				            <img src="../uploads/logo.png" style="width: 70%;">
				        </td>
				        <td style="width: 20%;">
				            <div class="form-group">
				                <select name="forma" onchange="location = this.value;" class="form-control" />
				                    <option value="../vista/pag_usuario.php">
				                    	Bienvenido(a) <?php echo utf8_decode(strtoupper($parte[0]));?>
				                    </option>
				                	<option value="../vista/desconectar.php">
				                    	Cerrar sesión
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

				<h1 class="page-header" style="color: #534949;">Opciones Principales <font face="Arial" size="5">( Usuario común )</font></h1>

				<div class="well well-sm text-right">
					<a class="btn" href="../vista/reporte.php">
				    	Editar perfil
				    </a>
				</div>

				<!-- Información de usuario !-->

				<h1 class="page-header" style="color: #534949;">
				    Información Personal
				</h1>

				<table class="table table-striped" style="width: 100%; font-size: 13px;">
				    <thead>
				        <tr>
				            <th style="color: #534949;">

                				<span class="icon-profile"></span> Número de documento 

                				<br><br>
            				</th>
            				<th style="color: #534949;">

				                <span class="icon-clipboard"></span> Tipo de documento 

				                <br><br>
				            </th>
				            <th style="color: #534949;">
				                
				                <span class="icon-user"></span> Nombres y apellidos 

				                <br><br>
				            </th>
				            <th style="color: #534949;">

				                <span class="icon-users"></span> Rol de usuario 

				                <br><br>
				            </th>
				            <th style="color: #534949;">

				                <span class="icon-phone"></span> Contacto 

				                <br><br>
				            </th>
				            <th style="color: #534949;">

				                <span class="icon-envelop"></span> Correo electrónico 

				                <br><br>
				            </th>
				            <th style="color: #534949;">

				                Estado 

				                <br><br>
				            </th>				
				        </tr>
				    </thead>
				    
				    <?php foreach($this->model->Perfil($_SESSION['id_u']) as $r): ?>
				        <tr>
				            <td><?php echo $r->__GET('no_documento'); ?></td>
				            <td><?php echo $r->__GET('tipo_documento'); ?></td>
				            <td><?php echo strtoupper($r->__GET('nombre')); ?></td>
				            <td><?php echo $r->__GET('rol'); ?></td>
				            <td><?php echo $r->__GET('celular'); ?></td>
				            <td><?php echo strtoupper($r->__GET('correo')); ?></td>
				            <td><?php echo $r->__GET('estado'); ?></td>
				        </tr>
				    <?php endforeach; ?>
				</table>

				<!-- Información del vehículo !-->

				<h1 class="page-header" style="color: #534949;">
				    Información del Vehículo
				</h1>

				

				<br><br><br><br>
            </div>
        </div>
    </div>
</body>

<?php
}
?>

</html>