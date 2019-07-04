<?php require_once('Connections/conexion.php'); 
    if(isset($_POST['boton'])){
        if($_POST['nombre'] == ''){
            $error1 = '<span class="error">Ingrese su nombre</span>';
        }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
            $error2 = '<span class="error">Ingrese un email correcto</span>';
        }else if($_POST['asunto'] == ''){
            $error3 = '<span class="error">Ingrese un asunto</span>';
        }else if($_POST['mensaje'] == ''){
            $error4 = '<span class="error">Ingrese un mensaje</span>';
        }else{
            $dest = "tu@email.com"; //Email de destino
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $asunto = $_POST['asunto']; //Asunto
            $cuerpo = $_POST['mensaje']; //Cuerpo del mensaje
            //Cabeceras del correo
            $headers = "From: $nombre <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 
            if(mail($dest,$asunto,$cuerpo,$headers)){
 
                foreach($_POST AS $key => $value) {
                    $_POST[$key] = mysql_real_escape_string($value);
                } 
 
                $sql = "INSERT INTO contactos (nombre, email, asunto, mensaje)  VALUES('$nombre','$email','$asunto','$cuerpo')";
                mysql_query($sql) or die(mysql_error()); 
 
                $result = '<div class="result_ok">Email enviado correctamente <img src="http://web.tursos.com/wp-includes/images/smilies/icon_smile.gif" alt=":)" class="wp-smiley"> </div>';
                // si el envio fue exitoso reseteamos lo que el usuario escribio:
                $_POST['nombre'] = '';
                $_POST['email'] = '';
                $_POST['asunto'] = '';
                $_POST['mensaje'] = '';
 
            }else{
                $result = '<div class="result_fail">Hubo un error al enviar el mensaje <img src="http://web.tursos.com/wp-includes/images/smilies/icon_sad.gif" alt=":(" class="wp-smiley"> </div>';
            }
        }
    }
?>
<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Aqui toda nuestra descripcion">
		<meta name="keywords" content="Aqui, Palabras, Clave">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/slides.min.jquery.js"></script>
        <script src='js/funciones.js'></script>
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
						<li><a href="index.php">Home</a></li>						
						<li><a href="mapa_web.php">Mapa Web</a></li>
						<li><a href="contacto.php">Contacto</a></li>
					</ul>
				</nav>
			</header>
			<?php include("inc/menu.php"); ?>
			<div id="izquierda" style="	background-color: #f2f2f2;">
			<div id="contenido">
        <form class='contacto' method='POST' action=''>
            <div><label>Tu Nombre:</label><input type='text' class='nombre' name='nombre' value='<?php echo @$_POST['nombre']; ?>'><?php echo @$errors[1] ?></div>
            <div><label>Tu Email:</label><input type='text' class='email' name='email' value='<?php echo @$_POST['email']; ?>'><?php echo @$errors[2] ?></div>
            <div><label>Asunto:</label><input type='text' class='asunto' name='asunto' value='<?php echo @$_POST['asunto']; ?>'><?php echo @$errors[3] ?></div>
            <div><label>Mensaje:</label><textarea rows='6' class='mensaje' name='mensaje'><?php echo @$_POST['mensaje']; ?></textarea><?php echo @$errors[4] ?></div>
            <div><input type='submit' value='Envia Mensaje' class='boton' name='boton'></div>
            <?php echo @$result; ?>
        </form>
				</div>
			</div>			
				<aside>
					<?php include("inc/buscador.php"); ?>
					<?php include("inc/estadisticas.php"); ?>
					<?php include("inc/all_categories.php"); ?>
					<?php include("inc/articulos_recientes.php"); ?>
				</aside>
			<footer>
				<div class="grid1">
				<div class="general">
				<h2><img src="img/flecha.png">Lo más nuevo</h2>
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
				<h2><img src="img/flecha.png">Lo más visto</h2>
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
				<h2><img src="img/flecha.png">Lo más visto</h2>
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
				<h2><img src="img/flecha.png">Lo más valorado</h2>
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
				<form action="<?php echo $urlWeb ?>inc/arrancar.php" method="POST" name="formLogin"> 
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