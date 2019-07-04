<?php 

/*--- Formateo ---*/

if (!function_exists("GetSQLValueString")) {
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
		if (PHP_VERSION < 6) {
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		}
		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
		switch ($theType) {
		case "text":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;    
		case "long":
		case "int":
			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
			break;
		case "double":
			$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
			break;
		case "date":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;
		case "defined":
			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
			break;
		}
	    return $theValue;
	}
}
/*--- Sacar Datos De La Web ---*/

mysql_select_db($database_conexion, $conexion);
$query_DatosWeb = "SELECT * FROM datos";
$DatosWeb = mysql_query($query_DatosWeb, $conexion) or die(mysql_error());
$row_DatosWeb = mysql_fetch_assoc($DatosWeb);
$totalRows_DatosWeb = mysql_num_rows($DatosWeb);
$urlWeb=$row_DatosWeb['url'];
$nombreWeb=$row_DatosWeb['nombre'];
mysql_free_result($DatosWeb);
	
/*--- Sacar Nombre A Partir De id Usuario ---*/

function nombre($iduser){
	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_ObtenerNombre= sprintf("SELECT nombre FROM usuarios WHERE id = %s",$iduser,"int");
	$ObtenerNombre = mysql_query($query_ObtenerNombre,$conexion) or die(mysql_error());
	$row_ObtenerNombre = mysql_fetch_assoc($ObtenerNombre);
	$totalRows_ObtenerNombre = mysql_num_rows($ObtenerNombre);
	return $row_ObtenerNombre['nombre'];
	mysql_free_result($ObtenerNombre);
}

/*--- Sacar Avatar A Partir De id Usuario ---*/

function avatar($iduser){
	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_ObtenerNombre= sprintf("SELECT avatar FROM usuarios WHERE id = %s",$iduser,"int");
	$ObtenerNombre = mysql_query($query_ObtenerNombre,$conexion) or die(mysql_error());
	$row_ObtenerNombre = mysql_fetch_assoc($ObtenerNombre);
	$totalRows_ObtenerNombre = mysql_num_rows($ObtenerNombre);
	return $row_ObtenerNombre['avatar'];
	mysql_free_result($ObtenerNombre);
}

/*--- Cerrar Sesion ---*/

$logoutAction = $_SERVER['PHP_SELF']."?dologout=true";
if((isset($_GET['dologout'])) && ($_GET['dologout']=="true")){
	$_SESSION['username'] = NULL;
	$_SESSION['id'] = NULL;
	unset($_SESSION['username']);
	unset($_SESSION['id']);
	$logoutGoTo = $urlWeb;
	if($logoutGoTo){
		header("Location: $logoutGoTo");
		exit;
	}
}
?>
<?php

function hace_tiempo($valor){

// FORMATOS:
// segundos    desde 1970 (función time())        hace_tiempo('12313214');
// defecto (variable $formato_defecto)        hace_tiempo('12:01:02 04-12-1999');
// tu propio formato                        hace_tiempo('04-12-1999 12:01:02 [n.j.Y H:i:s]');

$formato_defecto="H:i:s j-n-Y";

// j,d = día
// n,m = mes
// Y = año
// G,H = hora
// i = minutos
// s = segundos

if(stristr($valor,'-') || stristr($valor,':') || stristr($valor,'.') || stristr($valor,',')){

    if(stristr($valor,'[')){
        $explotar_valor=explode('[',$valor);
        $valor=trim($explotar_valor[0]);
        $formato=str_replace(']','',$explotar_valor[1]);
    }else{
        $formato=$formato_defecto;
    }

    $valor = str_replace("-"," ",$valor);
    $valor = str_replace(":"," ",$valor);
    $valor = str_replace("."," ",$valor);
    $valor = str_replace(","," ",$valor);

    $numero = explode(" ",$valor);

    $formato = str_replace("-"," ",$formato);
    $formato = str_replace(":"," ",$formato);
    $formato = str_replace("."," ",$formato);
    $formato = str_replace(","," ",$formato);

    $formato = str_replace("d","j",$formato);
    $formato = str_replace("m","n",$formato);
    $formato = str_replace("G","H",$formato);

    $letra = explode(" ",$formato);

    $relacion[$letra[0]]=$numero[0];
    $relacion[$letra[1]]=$numero[1];
    $relacion[$letra[2]]=$numero[2];
    $relacion[$letra[3]]=$numero[3];
    $relacion[$letra[4]]=$numero[4];
    $relacion[$letra[5]]=$numero[5];

    $valor = mktime($relacion['H'],$relacion['i'],$relacion['s'],$relacion['n'],$relacion['j'],$relacion['Y']);

}

$ht = time()-$valor;
if($ht>=2116800){
$dia = date('d',$valor);
$mes = date('n',$valor);
$año = date('Y',$valor);
$hora = date('H',$valor);
$minuto = date('i',$valor);
$mesarray = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
$fecha = "el $dia de $mesarray[$mes] del $año";
}
if($ht<30242054.045){$hc=round($ht/2629743.83);if($hc>1){$s="es";}$fecha="hace $hc mes".@$s;}
if($ht<2116800){$hc=round($ht/604800);if($hc>1){$s="s";}$fecha="hace $hc semana".@$s;}
if($ht<561600){$hc=round($ht/86400);if($hc==1){$fecha="ayer";}if($hc==2){$fecha="antes de ayer";}if($hc>2)$fecha="hace $hc días";}
if($ht<84600){$hc=round($ht/3600);if($hc>1){$s="s";}$fecha="hace $hc hora".@$s;if($ht>4200 && $ht<5400){$fecha="hace más de una hora";}}
if($ht<3570){$hc=round($ht/60);if($hc>1){$s="s";}$fecha="hace $hc minuto".@$s;}
if($ht<60){$fecha="hace $ht segundos";}
if($ht<=3){$fecha="ahora";}
return $fecha;

}
?>


