<!DOCTYPE html>

<?php require_once 'modelo/Login.php';

$usuario = new Login();

if (isset($_POST['grabar']) and $_POST['grabar'] == 'si')
{
	$usuario->Usuario();
}else{

}
?>

<html lang="es">

<head>

	<title>Sistema de parqueadero BiMo</title>

	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="vista/css/pagina-principal.css" />
	<link rel="stylesheet" type="text/css" href="fonts.css">

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

<body>

	<!-- Header -->
	
	<header id="header">
		<div class="inner">
			<a href="http://bimoprueba.epizy.com/bimo/index.php" class="logo"><img src="uploads/sena.png" width="42%"></a>
			<nav id="nav">
				<a href="vista/login_guarda.php"><span class="icon-user-tie"></span>&nbsp Acceso administrativo</a>
			</nav>
			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		</div>
	</header>

	<!-- Banner -->
	
	<section id="banner">
		<div class="inner">
			<header>
				<h1 style="font-family: calibri Light;">Sistema de parqueadero</h1>
			</header>

			<div class="flex ">

				<div>
					<span class="icon-users"></span>
					<a href="vista/ayuda.php"><h3>Ayuda al usuario</h3></a>
					<p>Todo lo que necesitas saber</p>
				</div>

				<div>
					<span class="icon-bullhorn"></span>
					<a href="vista/noticias.php"><h3>Noticias</h3></a>
					<p>Enterate de lo que sucede en nuestro sitio</p>
				</div>

				<div>
					<span class="icon-pushpin"></span>
					<a href="vista/acerca_de_nosotros.php"><h3>Acerca de nosotros</h3></a>
					<p>Conocenos un poco más</p>
				</div>
			</div>

			<footer>
				<!-- <a href="#" class="button">Iniciar sesión</a> !-->
			</footer>
		</div>
	</section>


	<!-- Three -->
		
	<section id="three" class="wrapper align-center">
		<div class="inner">
			<div class="flex flex-2">
				<article>

					<header>
						<h5>Iniciar sesión como</h5><h3>Usuario BiMo</h3>
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
										    window.location='http://bimoprueba.epizy.com/bimo/index.php';
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
						<h3>Registrate y se miembro de nuestro parqueadero</h3>
					</header>
					
					<p>Para participar y acceder a los beneficios que te ofrece el parqueadero del CEET Complejo Sur, debes de cumplir con los siguientes requisitos:<br /><br />1). Estar matriculado a un progarma de formación que te ofrezca el SENA.<br /><br />2). Y por ultimo, estar aún en etapa lectiva.</p>
					
					<footer>
						<a href="vista/pag_verificar.php" class="button">Registrarse ahora</a>
					</footer>
				</article>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="../vista/js/pagina-principal-uno.js"></script>
	<script type="text/javascript" src="../vista/js/pagina-principal-dos.js"></script>
</body>
</html>