<?php
$maxRows_DatosListado = 4;
$pageNum_DatosListado = 0;
if(isset($_GET['pageNum_DatosListado'])){
	$pageNum_DatosListado = $_GET['pageNum_DatosListado'];
}
$startRow_DatosListado = $pageNum_DatosListado * $maxRows_DatosListado;
mysql_select_db($database_conexion, $conexion);
$query_DatosListado = "SELECT * FROM articulos ORDER BY id DESC";
$query_limit_DatosListado = sprintf("%s LIMIT %d, %d",$query_DatosListado, $startRow_DatosListado, $maxRows_DatosListado);
$DatosListado= mysql_query($query_limit_DatosListado,$conexion) or die (mysql_error());
$row_DatosListado = mysql_fetch_assoc($DatosListado);
if(isset($_GET['totalRows_DatosListado'])){
	$totalRows_DatosListado= $_GET['totalRows_DatosListado'];
}else{
	$all_DatosListado= mysql_query($query_DatosListado);
	$totalRows_DatosListado= mysql_num_rows($all_DatosListado);
}
$totalPages_DatosListado= ceil($totalRows_DatosListado/$maxRows_DatosListado)-1;
do{ 
$texto=$row_DatosListado['mensajes'];
$cadenas=explode(".",$texto);
?>	
	<section id="section_l">
		<div id="tittle_post"><a href="ver_articulo.php?date=<?php echo $row_DatosListado['id'];?>"><?php echo $row_DatosListado['titulo'];?></a></div>
		<div id="contenido_post"><p><?php 
		$i=0;
		for($i=0;$i<5;$i++){
		if($cadenas[$i]==$cadenas[4]){
		 echo $cadenas[$i]."...";
		 }else{
			echo $cadenas[$i].".";
		}
		}
		$avatar= avatar($row_DatosListado['autor']);
		?>
		<a href="ver_articulo.php?date=<?php echo $row_DatosListado['id'];?>">Ver más</a></p></div>
		<div id="autor_post">
			<table width="100%" border="0" style="border-top:1px dashed #ccc">
				<tr>
					<td width="61" height="64"><?php echo "<img src='user/avatar/$avatar' width='60' height='60'>";?></td>
					<td width="294"><?php echo nombre($row_DatosListado['autor']);?></td>
					<td width="271" align="right"><span style="font-size:12px;"><?php echo $row_DatosListado['fecha'];?><br />en <?php echo $row_DatosListado['categoria'];?></span></td>
				</tr>
			</table>
		</div>
	</section>
<?php 
}while($row_DatosListado = mysql_fetch_assoc($DatosListado));
mysql_free_result($DatosListado); 
?>