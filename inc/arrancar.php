<?php 

require_once('../Connections/conexion.php'); 
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
	$_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
if (isset($_POST['nombre'])) {
	$loginUsername=$_POST['nombre'];
	$password=$_POST['password'];
	$MM_fldUserAuthorization = "";
	$MM_redirectLoginSuccess = "../index.php";
	$MM_redirectLoginFailed = "error.php";
	$MM_redirecttoReferrer = false;
	mysql_select_db($database_conexion, $conexion); 
	$LoginRS__query=sprintf("SELECT nombre, password ,id,rango FROM users WHERE nombre=%s OR email=%s AND password=%s AND rango>0",
		GetSQLValueString($loginUsername, "text"), 
		GetSQLValueString($loginUsername, "text"),
		GetSQLValueString($password, "text")); 
	$LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
	$row_ObtenerDeuser = mysql_fetch_assoc($LoginRS);
	$loginFoundUser = mysql_num_rows($LoginRS);
	if($loginFoundUser) {
		$loginStrGroup = "";
		if(PHP_VERSION >= 5.1){
			session_regenerate_id(true);
		}else{
			session_regenerate_id();
		}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	 	 
    $_SESSION['MM_id'] = $row_ObtenerDeuser['id'];	
    if (isset($_SESSION['PrevUrl']) && false) {
		$MM_redirectLoginSuccess .= (strpos($_SESSION['PrevUrl'],"?")) ? : "?=";	
		$MM_redirectLoginSuccess .= $_SESSION['PrevUrl'];
    }
	header(sprintf("Location: %s", $MM_redirectLoginSuccess));
	}
	else{
    header("Location: ". $MM_redirectLoginFailed );
	}
}
?>