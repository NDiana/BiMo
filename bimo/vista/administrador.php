<!DOCTYPE html>

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

<html>

<head>
	<title>Sistema de parqueadero BiMo</title>

	<meta charset="utf-8" />
        
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../vista/css/modal.css">
    <link rel="stylesheet" type="text/css" href="../fonts.css">

    <script type="text/javascript" src="../vista/js/soloNumeros.js"></script>
</head>

<body style="font-family: Arial;">

	<?php 
		$cadena = $_SESSION['Administrador'];
		
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
				                    <option value="../vista/pag_administrador.php">
				                    	Bienvenido(a) <?php echo utf8_decode(strtoupper($parte[0]));?>
				                    </option>
				                    <option value="../vista/perfil_administrador.php">
				                    	Mi perfil
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

				<!-- Información del parqueadero !-->

				<h1 class="page-header" style="color: #534949;">
				    Información del Parqueadero
				</h1>

				<table class="table table-striped" style="width: 100%; font-size: 13px;">
				    <thead>
				        <tr>
				            <th style="color: #534949; width: 50%;">

				                Nombre del Parqueadero 

				                <br><br>
				            </th>
				            <th style="color: #534949; width: 50%;">
				                
				                Capacidad del Parqueadero 

				                <br><br>
				            </th>
				            <th style="color: #534949;"></th>
				        </tr>
				    </thead>
				    
				    <?php foreach($this->model->Listar() as $r): ?>
				        <tr>
				            <td><?php echo $r->__GET('nombre_parqueadero'); ?></td>
				            <td><?php echo strtoupper($r->__GET('capacidad_parqueadero')); ?></td>
				            <td>
				                <a class="btn" href="#">Actualizar información</a>
				            </td>
				        </tr>
				    <?php endforeach; ?>
				</table>

				<!-- Opciones de administrador !-->

				<h1 class="page-header" style="color: #534949;">Opciones Principales <font face="Arial" size="5">( Administrador )</font></h1>

				<div class="well well-sm text-right">
					<a class="btn" href="../vista/reporte.php">
				    	<span class="icon-file-excel"></span> Realizar reporte según criterio de busqueda
				    </a>
				</div>         

				<br>

				<table width="100%" style="text-align: center;">
					<tr>
						<td><a onclick="document.getElementById('id01').style.display='block'"><img src="../uploads/lista.png" style="width:150px;" title="Ver lista de usuarios registrados"></a></td>

						<td><a href="../vista/pag_crear.php"><img src="../uploads/anadir.png" style="width:150px;" title="Añadir usuario"></a></td>

						<td><a onclick="document.getElementById('id02').style.display='block'"><img src="../uploads/consultar.png" style="width:150px;" title="Realizar consulta"></a></td>
					</tr>
				</table>

				<br><br><br><br>
            </div>
        </div>            

		<div class="w3-container"> 
			<div id="id01" class="w3-modal">
			    <div class="w3-modal-content" style="max-width:350px">
					<div style="text-align: right;"><br>
				       	<span onclick="document.getElementById('id01').style.display='none'" class="icon-cross" style="padding: 15px;" title="Cerrar"></span>
				    </div>

				    <form class="w3-container" action="../vista/pag_lista.php" method="post">
				        <div>
				        	<h4>¿Que tipo de usuario desea ver?</h4>

				        	<div class="form-group">
					        	<select class="form-control" name="id_rol">
					        		<option value="1">Administrador</option>
					        		<option value="2">Supervisor</option>
					        		<option value="3">Guarda de seguridad</option>
					        		<option value="4">Usuario común</option>
					        	</select>
					        </div>

				          	<button type="submit">Ver lista</button>
				        </div><br>
				    </form>
				</div>
		  	</div>
		</div>

		<div class="w3-container"> 
			<div id="id02" class="w3-modal">
			    <div class="w3-modal-content" style="max-width:350px">
					<div style="text-align: right;"><br>
				       	<span onclick="document.getElementById('id02').style.display='none'" class="icon-cross" style="padding: 15px;" title="Cerrar"></span>
				    </div>

				    <form class="w3-container" action="#" method="post">
				        <div>
				        	<h4>Realizar consulta por</h4>

				        	<h5>Número de documento</h5>

				        	<input type="text" pattern="[0-9]{8,11}" onkeypress="return soloNumeros(event)" name="no_documento" class="form-control" title="No se aceptan letras ni simbolos, minimo 8 números - maximo 11 números aceptados" placeholder="N° Documento identidad" required/>

				        	<br>

				          	<button type="submit">Consultar</button>
				        </div><br>
				    </form>
				</div>
		  	</div>
		</div>
    </div>
</body>

<?php
}
?>

</html>