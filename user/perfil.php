<?php 
require_once('../Connections/conexion.php'); 
if ((isset($_POST["estado"])) && ($_POST["estado"] == "form1")){
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
	$autor=@$_SESSION['id'];
	$contenido=strip_tags($_POST['contenido']);
	$mensaje=$_POST['mensajes'];
	$fecha= date("H:i:s j-n-Y");
					$result = mysql_query("INSERT INTO posts (contenido, autor,fecha) VALUES ( '$contenido','$autor','$fecha')");
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
		<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/slides.min.jquery.js"></script>
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/AjaxUpload.2.0.min.js"></script>
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
				<div id="contenido">
				<?php
				if(isset($_SESSION['id'])){
					?>
					<article>
						<?php include("../inc/listado_articulos.php"); ?>
					</article>
					<article>
					<section id="section_l">
				    <div id="textareaWrap">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="form1" id="form1">
								<textarea placeholder="Que estas pensando?" id="wall" name="contenido"></textarea>
								<div id="sharebtn"> <input type="submit" value="Publicar" class="button Share" style="" id="shareButton"/></div>
						<input type="hidden" name="estado" value="form1"/>
					</form>
					</div>
					</section>
					</article>
					<article>
						<?php include("../inc/listado_estados.php"); ?>
					</article>
					<?php
					}else{ 
$url=$_SERVER["REDIRECT_URL"];
$usuario = explode("/", $url);
$nombre=$usuario[2];
	mysql_select_db($database_conexion, $conexion);
	$query_DatosPerfil = "SELECT * FROM usuarios WHERE nombre='$nombre' LIMIT 1"; 
	$DatosPerfil= mysql_query($query_DatosPerfil,$conexion) or die (mysql_error());
	$row_DatosPerfil = mysql_fetch_assoc($DatosPerfil);
	$totalRows_DatosPerfil= mysql_num_rows($DatosPerfil);
	if($totalRows_DatosPerfil==1){
	echo $row_DatosPerfil["nombre"]." esta registrado.</br>";
	echo "Para ver las publicaciones de ".$row_DatosPerfil["nombre"].", regístrate hoy.</br>";
	}
	else{
echo "Esta página no está disponible</br>";

echo "Es posible que el enlace que has seguido esté roto o que se haya eliminado la página</br>";
	}
					}
					?>
				</div>
			</div>
				<aside>
					<?php include("../inc/perfil.php"); ?>
					<?php include("../inc/buscador.php"); ?>
					<?php include("../inc/estadisticas.php"); ?>
				    <?php include("../inc/all_categories.php"); ?>
					<?php include("../inc/articulos_recientes.php"); ?>
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
	<div id="foto">
				<section id="ventana">
		<form action="user/editar_foto.php" method="post" enctype="multipart/form-data" name="uploadform">
				<table width="311" border="0" align="center">
				<tr>
					<td width="79" align="right">Usuario</td>
					<td width="192"><input type="hidden"name="MAX_FILE_SIZE" value="2000000"><input name="userfile" type="file" class="box" id="userfile"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="right"><input name="upload" type="submit" class="box" id="upload" value="Upload"></td>
				</tr>
				</table></form>
				<a onclick="javascript:cerrar();" style="cursor:pointer">cerrar</a>
				</section>		
		</div>
	</body>
</html>