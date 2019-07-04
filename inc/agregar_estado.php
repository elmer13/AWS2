<?php 
require_once('../Connections/conexion.php'); 
if ((isset($_POST["estado"])) && ($_POST["estado"] == "form1")){

	$autor=@$_SESSION['id'];
	$contenido=strip_tags($_POST['contenido']);
					$result = mysql_query("INSERT INTO posts (contenido, autor) VALUES ('$contenido','$autor')");
}
?>
					<section id="section_l">
					  <div id="textareaWrap">
					<form action="" method="post" name="form1" id="form1">
						<textarea placeholder="Que estas pensando?" id="wall" name="contenido"></textarea>
						<div id="sharebtn"> <input type="submit" value="Publicar" class="button Share" style="" id="shareButton"/></div>
						<input type="hidden" name="estado" value="form1"/>
					</form>
					  </div>
					</section>