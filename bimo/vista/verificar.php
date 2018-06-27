<html>

<head>
	<title>Verificar</title>

	<meta charset="utf-8" />
        
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../fonts.css">
</head>

<body style="font-family: Arial;">
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
				                <h4>Verificación del número de documento y correo electrónico</h4>
				            </div>
				        </td>
				    </tr>
				</table>

				</center>

				<br>

				<!-- Imagen linea horizontal de colores !-->

				<img src="../uploads/linea.png" width="100%">

				<!-- Opciones principales !-->

				<h4 class="page-header" style="color: #534949;">Por favor, verifique si su número de documento y correo electrónico esta en uso. Una vez realizada la verificación el sistema lo redireccionará al formulario de registro.</h4><br>
				
				<form id="frm-alumno" action="?c=Controlador&a=Verificar" method="post" enctype="multipart/form-data">
					<table style="width: 100%;">
						<tr>
							<td>
								<label style="color: #534949;">Número de documento</label>
						        <input style="width: 90%;" type="text" pattern="[0-9]{8,11}" onkeypress="return soloNumeros(event)" name="no_documento" class="form-control" title="No se aceptan letras ni simbolos, minimo 8 números - maximo 11 números aceptados" placeholder="Escribe aqui" required/>
							</td>
					        <td>
						        <label style="color: #534949;">Correo electrónico</label>
						        <input style="width: 90%;" type="text" name="correo" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@misena.edu.co" title="Por favor introduzca la dirección de correo electrónico requerida. Ejemplo: tucuenta@misena.edu.co" placeholder="Escribe aqui" required/>
					        </td>
						</tr>
						<tr>
							<td><br><br>
								<div class="text-center">
						        	<button class="btn btn-success" type="submit">Verificar información</button>
						    	</div>
							</td>					
						</tr>
				    </table>
				</form>

				<br>

				<div class="text-center">
				    <a class="btn" href="http://bimoprueba.epizy.com/bimo/index.php">Cancelar operación</a>
				</div>
            </div>
        </div>
    </div>
</body>
</html>