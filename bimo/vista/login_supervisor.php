<!DOCTYPE html>

<?php require_once '../modelo/Login.php';

$usuario = new Login();

if (isset($_POST['grabar']) and $_POST['grabar'] == 'si')
{
	$usuario->Supervisor();
}else{

}
?>

<html lang="es">

<head>
	<title>Acceso administrativo</title>

	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="../vista/css/pagina-principal.css" />
	<link rel="stylesheet" type="text/css" href="../fonts.css">

	<style type="text/css">
		textarea::-webkit-input-placeholder 
		{
			color: #534949 !important;
		}

		input[type="email"]::-webkit-input-placeholder 
		{
			color: #534949 !important;
		}

		input[type="password"]::-webkit-input-placeholder 
		{
			color: #534949 !important;
		}
	</style>
</head>

<body class="subpage">

	<!-- Header -->
	
	<header id="header">
		<div class="inner">
			<a href="http://bimoprueba.epizy.com/bimo/vista/login_supervisor.php" class="logo">
				<strong>A C C E S O &nbsp &nbsp A D M I N I S T R A T I V O</strong>
			</a>
			<nav id="nav">
				<a href="http://bimoprueba.epizy.com/bimo/index.php" title="Ir a inicio">
					<span class="icon-home"></span>&nbsp Página principal
				</a>
			</nav>
			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		</div>
	</header>

	<!-- Three -->
		
	<section id="three" class="wrapper align-center">
		<div class="inner">
			<div class="flex flex-2">
				<article>

					<header>
						<h5>Iniciar sesión como</h5><h3>Supervisor</h3>
					</header>

					<center>

					<form action="" method="post">

					   	<input type="email" name="correo" placeholder="Correo electrónico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@misena.edu.co" title="Por favor introduzca la dirección de correo electrónico requerida. Ejemplo: tucuenta@misena.edu.co" style="width: 50%; background-color: #fff; color: #534949 !important;" required/>

				    	<br>

				    	<input type="hidden" name="grabar" value="si">

				    	<input type="password" placeholder="Contraseña" name="pass" title="Caracteres minimos aceptados (8) - Simbolos aceptados por el sistema(¿?=$#/_-)" pattern="[a-zA-Z0-9_¿?=$#/_-]{8,50}" style="width: 50%; background-color: #fff; color: #534949 !important;" required/>

					   	<br>

						<?php
						if(isset($_GET['e']))
						{
						?>

						<font face="Calibri Light" style="font-size: 18px;">

							<?php
								switch($_GET['e'])
								{
									case 'login':
									?>
										<script type='text/javascript'>
										    alert('Usuario o contraseña incorrecto');
										    window.location='http://bimoprueba.epizy.com/bimo/vista/login_supervisor.php';
										</script>
									<?php
								}
							}
							?>
						</font>

						<input type="submit" value="Iniciar sesión" class="button">
					</form>
					</center>
				</article>
						
				<article>
					<!-- <div class="image round">
						<img src="" alt="Pic 02" />
					</div> !-->
							
					<header>
						<h3>Identificar rol</h3>
					</header>
					
					<p><h5>Iniciar sesión como</h5><a href="http://bimoprueba.epizy.com/bimo/vista/login_administrador.php" class="button"><span class="icon-user-tie"></span> &nbsp ADMINISTRADOR</a></p>

					<p><h5>Iniciar sesión como</h5><a href="http://bimoprueba.epizy.com/bimo/vista/login_guarda.php" class="button"><span class="icon-user-tie"></span>&nbsp GUARDA DE SEGURIDAD</a></p>
				</article>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="../vista/js/pagina-principal-uno.js"></script>
	<script type="text/javascript" src="../vista/js/pagina-principal-dos.js"></script>
</body>
</html>