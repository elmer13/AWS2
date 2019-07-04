<?php require_once('Connections/conexion.php'); 
$iddelpost=$_GET['date'];

$updateSQL = sprintf("UPDATE posts SET visitas= visitas+1 WHERE id=%s",
			GetSQLValueString($iddelpost, "int"));
	mysql_select_db($database_conexion, $conexion);
	$Result1=mysql_query($updateSQL,$conexion) or die(mysql_error());
	
	mysql_select_db($database_conexion, $conexion);
	$query_DatosPostGet = sprintf("SELECT * FROM articulos WHERE id=%s",$iddelpost,"int");
	$DatosPostGet = mysql_query($query_DatosPostGet, $conexion) or die(mysql_error());
	$row_DatosPostGet = mysql_fetch_assoc($DatosPostGet);
	$totalRows_DatosPostGet = mysql_num_rows($DatosPostGet);
	
	
	mysql_free_result($DatosPostGet);

		$avatar= avatar($row_DatosPostGet['autor']);
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
			<div id="izquierda">
				<div id="contenido_bienvenidos">
					<section id="bienvenidos">
						<hgroup><h3>Bienvenido a nuestro sitio web</h3></hgroup>
						<p>
							<ul>
								<li>+ Ofrecemos diversos servicios relacionados con paginas web. </li>
								<li>+ Estaras continuamente informado con la actualidad del mundo de la Informática.</li>
								<li>+ Te enseñaremos las nuevas tecnologias.</li>
								<li>+ Podrás descargar material útil para tu web y para tu pc.</li>
								<li>+ Registrate y tendrás acceso a muchas más secciones de la página.</li>
							</ul>
						</p>
					</section>	
				</div>
				<div id="contenido">
					<section id="section_l">
					<div id="tittle_post"><?php echo $row_DatosPostGet['titulo'];?></div>
					<div id="contenido_post"><p><?php echo $row_DatosPostGet['mensajes'];?></p></div>
						<div id="autor_post">
							<table width="100%" border="0" style="border-top:1px dashed #ccc">
							  <tr>
								<td width="61" height="64"><?php echo "<img src='user/avatar/$avatar' width='60' height='60'>";?></td>
								<td width="294"><?php echo nombre($row_DatosPostGet['autor']);?></td>
								<td width="271" align="right"><span style="font-size:12px;"><?php echo $row_DatosPostGet['fecha'];?><br />en <?php echo $row_DatosPostGet['categoria'];?></span></td>
								</tr>
							 </table>
						</div>
					</section>
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