<?php
/* ARCHIVO AJAX_VOTO.PHP */

require_once('Connections/conexion.php'); 
if($_POST){
	$voto = trim($_POST["voto"]);
	$id = filter_var(trim($_POST["id"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	if (!isset($_COOKIE["votado_".$id]))
	{
		mysql_select_db($database_conexion, $conexion);
		$query_DatosListado = "SELECT ".$voto." FROM estado WHERE id='$id' limit 1";
		$DatosListado= mysql_query($query_DatosListado,$conexion) or die (mysql_error());
		$row_DatosListado = mysql_fetch_assoc($DatosListado);
		if ($row_DatosListado = mysql_fetch_assoc($DatosListado)) 
		$numero=$row_DatosListado[$voto];
		$votado = "UPDATE estado SET ".$voto."=".$voto."+1 WHERE id='$id'";
		$votado= mysql_query($votado,$conexion) or die (mysql_error());
		setcookie("votado_".$id, 1, time()+7200);
		echo (@$numero+1);
	}

}

?>