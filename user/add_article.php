<?php 
require_once('../Connections/conexion.php'); 
if(!isset($_SESSION['id'])){
header("Location: ".$urlWeb);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")){
	$categoria=$_POST['categoria'];
	if($categoria==1){
		$categoria="Imagenes";
	}
	if($categoria==2){
		$categoria="Descargas";
	}
	if($categoria==3){
		$categoria="tutoriales";
	}
	if($categoria==4){
		$categoria="videos";
	}
	$autor=$_POST['autor'];
	$titulo=$_POST['titulo'];
	$descripcion=strip_tags($_POST['mensajes']);
	$mensaje=$_POST['mensajes'];
	$fecha=$_POST['fecha'];
					$result = mysql_query("INSERT INTO articulos (titulo, seo, keywords, descripcion, mensajes, categoria, autor, fecha) VALUES ('$titulo', '$titulo', '$titulo', '$descripcion','$mensaje','$categoria','$autor','$fecha')");
					$result2 = mysql_query("INSERT INTO articulos_users (id_user) VALUES ('$autor')"); 
					header("Location: ../".$_SESSION['username']);
}
?>
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
						<li><a href="index.php">Home</a></li>						
						<li><a href="mapa_web.php">Mapa Web</a></li>
						<li><a href="contacto.php">Contacto</a></li>
					</ul>
				</nav>
			</header>
			<?php include("../inc/menu.php"); ?>
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
									<article>
					<section id="section_l">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="form2" id="form2">
						<table width="450" align="center">
							<tr valign="baseline">
								<td>Titulo<br/>
								<input type="text" name="titulo" value="" size="72"></td>
							</tr>
							<tr valign="baseline">
								<td>Mensajes<br/>
								<textarea name="mensajes"  cols="50" rows="5"></textarea>
							</tr>
							<tr valign="baseline">
								<td>Categoria<br/>
									<select name="categoria">
									<option value="1"<?php if (!(strcmp(1,""))) {echo "SELECTED";} ?>>imagenes</option>
									<option value="2"<?php if (!(strcmp(2,""))) {echo "SELECTED";} ?>>Descargas</option>
									<option value="3"<?php if (!(strcmp(3,""))) {echo "SELECTED";} ?>>Tutoriales</option>
									<option value="4"<?php if (!(strcmp(4,""))) {echo "SELECTED";} ?>>Videos</option>
									</select>
								</td>
							</tr>
							<tr valign="baseline">
								<td align="right"><input type="submit" value="Agregar"/></td>
							</tr>
						</table>
						<input type="hidden" name="seo" value=""/>
						<input type="hidden" name="keywords" value=""/>
						<input type="hidden" name="descripcion" value=""/>
						<input type="hidden" name="autor" value="<?php echo $_SESSION["id"];?>"/>
						<input type="hidden" name="fecha" value="Publicado el <?php echo date("d/m/Y") . " A las " . date("H:i:s")?>"/>
						<input type="hidden" name="MM_insert" value="form2"/>
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