
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
		<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
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
				<?php if (isset ($_SESSION['id'])){?>
					<article>
						<?php include("inc/listado.php"); ?>
					</article>
					<?php } ?>
					<article>
						<?php include("inc/listado_articulos.php"); ?>
					</article>
				</div>
			</div>
				<aside>
					<?php if (isset ($_SESSION['id'])){
					 include("inc/perfil.php");} ?>
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
	</body>
</html>