<?php require_once('Connections/conexion.php'); ?>
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
				<div id="contenido">
					<article>
						<hgroup><h2 class="titulo">Sobre Nosotros</h2></hgroup>
						<p class="fecha">2 de octubre del 2012</p>
						<p>Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.<br/><br/>
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.<br/><br/>
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.<br/><br/>
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.<br/><br/>
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						Curabitur a leo sagittis, aliquet magna at, dictum diam.
						Morbi iaculis urna in leo fringilla elementum.
						In porta elit eu commodo vulputate.
						Aliquam non ante nec risus egestas cursus vitae nec nunc.
						Suspendisse sed dolor eu lorem mollis pretium.
						hola estoy aqui abajo jajajajajajajjajajajaja
						Curabitur a leo sagittis, aliquet magna at, dictum diam.</p>
					</article>
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