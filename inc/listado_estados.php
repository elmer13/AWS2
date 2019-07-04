<?php
$maxRows_DatosListado = 6;
$pageNum_DatosListado = 0;
mysql_select_db($database_conexion, $conexion);
$query_DatosListado = "SELECT * FROM posts ORDER BY id DESC";
$query_limit_DatosListado = sprintf("%s LIMIT %d, %d",$query_DatosListado, $startRow_DatosListado, $maxRows_DatosListado);
$DatosListado= mysql_query($query_limit_DatosListado,$conexion) or die (mysql_error());
$row_DatosListado = mysql_fetch_assoc($DatosListado);
if($row_DatosListado!=NULL){
if(isset($_GET['totalRows_DatosListado'])){
	$totalRows_DatosListado= $_GET['totalRows_DatosListado'];
}else{
	$all_DatosListado= mysql_query($query_DatosListado);
	$totalRows_DatosListado= mysql_num_rows($all_DatosListado);
}
$totalPages_DatosListado= ceil($totalRows_DatosListado/$maxRows_DatosListado)-1;
do{ 
$avatar= avatar($row_DatosListado['autor']);
$numero= $row_DatosListado['fecha'];
?>	
<style>
.avatar{
width:60px;
padding-right:10px;
}
.autor{
width:500px;
padding-right:10px;
}
.like{
	width:100px;
	padding-right:10px;
}

/*voting style */
.votos {float:right;width:138px;margin:0 0 10px 40px;border:2px solid #eee;padding:10px;list-style:none;}

.votos .dw_button {background: url(img/votos.png) -64px 0 no-repeat;float: left;height: 42px;width: 64px;cursor:pointer;margin:0 0 0 10px}
.votos .dw_button:hover {background: url(img/votos.png) no-repeat -64px -42px;}

.votos .up_button {background: url(img/votos.png) 0 0 no-repeat;float: left;height: 42px;width: 64px;cursor:pointer;}
.votos .up_button:hover{background: url(img/votos.png) no-repeat 0 -42px;}

.voting_btn{float:left;}
.voting_btn span{font-size: 11px;font-family:Arial,sans-serif;margin:10px 0 0 37px;display:block;width:27px;height:22px;line-height:22px;text-align:center}

.likes_votado{background: url(img/votos.png) no-repeat 0 -42px !important;}
.hates_votado{background: url(img/votos.png) no-repeat -64px -42px !important;}

</style>
<section id="section_l">	
			<table width="100%" border="0">
				<tr>
					<td class="avatar"><?php echo "<img src='user/avatar/$avatar' width='60' height='60'>";?></td>
					<td class="autor"><div style="color:#274684;"><?php echo nombre($row_DatosListado['autor']);?></div><div id="container"><?php echo $row_DatosListado['contenido']; ?></div>
					<div><?php echo hace_tiempo($numero); ?></div>
					</td>
					<td class="like">
						<ul class="votos">
			<li class="voting_btn up_button" ><a href="user/megusta.php?voto=positivo&id=<?=$row_DatosListado['id']?>"/><span><?php echo $row_DatosListado["likes"]; ?></span></li>
			<li class="voting_btn dw_button" ><a href="user/megusta.php?voto=negativo&id=<?=$row_DatosListado['id']?>"/><span><?php echo $row_DatosListado["hates"]; ?></span></li>
		</ul></ul>
		</td>
				</tr>
			</table>
</section>
<?php 
}while($row_DatosListado = mysql_fetch_assoc($DatosListado));
mysql_free_result($DatosListado); 
	}else{
		echo "<h3>No hay entradas disponibles.</h3>";
	}
?>


