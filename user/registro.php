<?php require_once('../Connections/conexion.php'); ?>
<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Aqui toda nuestra descripcion">
		<meta name="keywords" content="Aqui, Palabras, Clave">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../js/slides.min.jquery.js"></script>
		<script>
		  $(function(){
		  $("#slideshow").slides();
		  });
		</script>
		<title>Projecto Final</title>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<div id="logotipo"><p><a href="<?php echo $urlWeb ?>">AWS2</a></p></div>
				<nav>
					<ul>
						<li><a href="../index.php">Home</a></li>						
						<li><a href="../mapa_web.php">Mapa Web</a></li>
						<li><a href="../contacto.php">Contacto</a></li>
					</ul>
				</nav>
			</header>
			<?php include("../inc/menu.php"); ?>
			<div id="izquierda">
				<div id="contenido">
					<article>
						<section id="section_l">
							<form id="form-logeo" class="generic" method="post">
							<div id="login-user" class="field">
							<label>Nombre de Usuario (Nick)</label>
							<input id="login-username" type="text" class="text" name="username" placeholder="Nombre de Usuario" tabindex="1" maxlength="200">
							</div>

							<div id="login-pass" class="field">
							<label>Contraseña</label>
							<input id="login-password" type="password" class="text" name="password" placeholder="Contraseña" tabindex="3" maxlength="32">
							</div>
							<div id="login-pass" class="field">
							<label>Verificar contraseña</label>
							<input id="login-password" type="password" class="text" name="rpassword" placeholder="Contraseña" tabindex="3" maxlength="32">
							</div>
							<div id="login-user" class="field">
							<label>Email</label>
							<input id="login-username" type="text" class="text" name="email" placeholder="EMail" tabindex="1" maxlength="200">
							</div>
							<div class="btnlogeo">
							<input id="login-submit" type="submit" value="Listo!">
							</div>
							<?php
							if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['rpassword']) && isset($_POST['email']))
							{
								$username = $_POST['username'];
								$password = $_POST['password'];
								$rpassword = $_POST['rpassword'];
								$email = $_POST['email'];
								$Fail = false;
								
								$GetUser = mysql_query("SELECT * FROM usuarios WHERE nombre='$username'");
							  if(!preg_match('/^[a-z0-9\_\-]{4,16}$/i', $username)) { 
							  die('<span style="color:red;">El nombre contiene carácteres incorrectos o es menor a 4 carácteres o mayor a 16</span>'); 
							  }
							  if(strlen($password) < 4 || strlen($password) > 35) {
							  die('<span style="color:red;">La contraseña debe tener entre 4 y 35 carácteres</span>');
							  }
							  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
							  die('<span style="color:red;">EMail incorrecto</span>'); 
							  }
								if(mysql_num_rows($GetUser) > 0)
								{
									echo '<span style="color:red;">El usuario $username ya existe, por favor elige otro</span>';
									$Fail = true;
								}
								elseif(empty($username) || empty($password) || empty($rpassword))
								{
									echo '<span style="color:red;">Algun dato esta vacio</span>';
									$Fail = true;
								}
								elseif($rpassword !== $password)
								{
									echo '<span style="color:red;">Las contraseñas no son iguales</span>';
									$Fail = true;
								}
								if($Fail == false)
								{
								$password = md5($password);
								$rpassword = md5($rpassword);
								$location = "no_avatar.jpg";
							  mysql_query("INSERT INTO usuarios VALUES('','$username','$password','$rpassword','$email','$location','1')");
									echo '<span style="color:green;">Tu usuario ha sido registrado</span><meta http-equiv="Refresh" content="1;URL=../" />';
								}
							}
							?>
							</form>
							</section>
						</article>
				</div>
			</div>			
				<aside>
					<?php include("../inc/buscador.php"); ?>
					<?php include("../inc/estadisticas.php"); ?>
					<?php include("../inc/all_categories.php"); ?>
					<?php include("../inc/articulos_recientes.php"); ?>
				</aside>
			<footer>
				<div class="grid1">
				<div class="general">
				<h2><img src="../img/flecha.png">Lo más nuevo</h2>
				<ul>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
				</ul>
				</div>
				</div>
				<div class="grid2">
				<div class="general">
				<h2><img src="../img/flecha.png">Lo más visto</h2>
				<ul>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
				</ul>
				</div>
				</div>
				<div class="grid3">
				<div class="general">
				<h2><img src="../img/flecha.png">Lo más visto</h2>
				<ul>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
				</ul>
				</div>
				</div>
				<div class="grid4">
				<div class="general">
				<h2><img src="../img/flecha.png">Lo más valorado</h2>
				<ul>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
					<li>columna</li>
				</ul>
				</div>
				</div>
			</footer>
			<div id="copyright">
				<div id="txt_fo"><a href="#">Pagina1</a> <a href="#">Pagina2</a> <a href="#">Pagina3</a> <a href="#">Pagina4</a></div>
			</div>
			<script type="text/javascript">
			$(document).ready(function(){
			$('#arriba').click(function(){
			$('html,body').animate({scrollTop:0},1000);
			return false;
			});
			});
			</script>
			<div class="item_top"><a href="" id="arriba">Subir arriba</a></div>
		</div>
		<div id="iniciar_sesion">
				<section id="ventana">
				<form action="<?php echo $urlWeb ?>../inc/arrancar.php" method="POST" name="formLogin"> 
				<table width="311" border="0" align="center">
				<tr>
					<td width="79" align="right">Usuario</td>
					<td width="192"><label for="nombre"></label>
						<input name="nombre" type="text" id="nombre" size="30" /></td>
				</tr>
				<tr>
					<td><br>
					</td>
				</tr>
				<tr>
					<td align="right">Password</td>
					<td><label for="password"></label>
						<input name="password" type="text" id="password" size="30" /></td>
				</tr>
				<tr>
					<td><br>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="right"><input type="submit" name="button2" id="button2" value="Iniciar sesi&oacute;n" /></td>
				</tr>
				</table></form>
				<a onclick="javascript:cerrar();" style="cursor:pointer">cerrar</a>
				</section>		
		</div>
	</body>
</html>