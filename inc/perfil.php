
<style>
.loaderAjax{
	display: none;
}

#contenedorImagen .fotografia{
	margin: 20px auto;
	width:120px;
	height:120px;
	border: 1px solid #ccc;
	-moz-border-radius: 8px 8px 8px 8px;
	-webkit-border-radius: 8px 8px 8px 8px;
	border-radius: 8px 8px 8px 8px;
}

#wraper .contentLayout{
    text-align: center;
}
#mod{
	display:inline;
	font-size:10px;
	margin-left:150px;
}
</style>
<?php
if(isset($_SESSION['id'])){
	@$id=$_SESSION['id'];
	mysql_select_db($database_conexion, $conexion);
	$query_DatosPerfil = "SELECT * FROM usuarios WHERE id=$id"; 
	$DatosPerfil= mysql_query($query_DatosPerfil,$conexion) or die (mysql_error());
	$row_DatosPerfil = mysql_fetch_assoc($DatosPerfil);
	$totalRows_DatosPerfil= mysql_num_rows($DatosPerfil);
	$destino = $row_DatosPerfil['avatar'];?>
		<script type="text/javascript">
		function ver(){
			document.getElementById('foto').style.display='block';
		}
		function cerrar(){
			document.getElementById('foto').style.display='none';
		}
		</script>
<section id="sectio_r">
	<div id="side_r">Perfil<div id="mod"><a href="user/modificar_perfil.php">Editar Perfil</a></div></div>
	    <section class="contentLayout" id="contentLayout">
	    	<div id="contenedorImagen">
			<?php echo "<img id='fotografia' class='fotografia' src='user/avatar/$destino' >";?></span><br/>
	    	</div>
	    </section>
	<span class="txt_side"><a href="user/online.php">Nombre : <?php echo $row_DatosPerfil["nombre"]; ?></a></span><br/>
	<span class="txt_side"><a href="user/miembros.php">Email : <?php echo $row_DatosPerfil["email"]; ?></a></span><br/>
	<a onclick="javascript:ver();" style="cursor:pointer">Editar foto de perfil</a>
</section>
<?php
}else{
	mysql_select_db($database_conexion, $conexion);
	$query_DatosPerfil = "SELECT * FROM usuarios WHERE nombre='$nombre' LIMIT 1"; 
	$DatosPerfil= mysql_query($query_DatosPerfil,$conexion) or die (mysql_error());
	$row_DatosPerfil = mysql_fetch_assoc($DatosPerfil);
	$destino = $row_DatosPerfil['avatar'];
	?>
	<section id="sectio_r">
	    <section class="contentLayout" id="contentLayout">
	    	<div id="contenedorImagen">
			<?php echo "<img id='fotografia' class='fotografia' src='user/avatar/$destino' >";?></span><br/>
	    	</div>
	    </section>
</section>
<?php
}
?>
