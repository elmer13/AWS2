<?php 
require_once('../Connections/conexion.php'); 
if(!isset($_SESSION['id'])){
header("Location: ".$urlWeb);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")){
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
	$titulo=$_POST['titulo'];
	$contenido=strip_tags($_POST['contenido']);
	$mensaje=$_POST['mensajes'];
	$fecha=$_POST['fecha'];
					$result = mysql_query("INSERT INTO posts (titulo, contenido, autor) VALUES ('$titulo', '$contenido','$autor')");
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
		<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
		<script>
		  $(function(){
		  $("#slideshow").slides();
		  });
		</script>
<script>
tinymce.init({
    selector: "textarea#elm1",
    theme: "modern",
    width: 500,
    height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
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
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="form1" id="form1">
						<table align="center">
							<tr valign="baseline">
								<td nowrap="nowrap" align="right">Titulo</td>
							</tr>
							<tr>
								<td><input type="text" name="titulo" value="" size="32"/></td>
							</tr>
							<tr valign="baseline">
								<td nowrap="nowrap" align="right">&nbsp;</td>
							</tr>
							<tr valign="baseline">
								<td nowrap="nowrap" align="right" valign="top">Contenido</td>
							</tr>
							<tr>
								<td><textarea id="elm1" name="contenido" cols="50" rows="15"></textarea></td>
							</tr>
							<tr valign="baseline">
								<td nowrap="nowrap" align="right">&nbsp;</td>
							</tr>
							<tr>
								<td><input type="submit" value="Agregar"/></td>
							</tr>
						</table>
						<input type="hidden" name="MM_insert" value="form1"/>
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