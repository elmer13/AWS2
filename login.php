<?php require_once('Connections/conexion.php'); ?>
<?php
if(isset($_POST['username']) && isset($_POST['password'])){

$username=$_POST['username'];
$password=md5($_POST['password']);
$fail=false;
	$busqueda=mysql_query("SELECT * FROM usuarios WHERE nombre='$username' AND password='$password'");
		if(empty($username) || empty($password))
	{
		echo '<span style="color:red;">los datos estan vacios</span>';
	}
	elseif(mysql_num_rows($busqueda) == 0)
	{
		echo '<span style="color:red;">El usuario no existe o la contraseña es incorrecta</span>';
		$Fail = true;
	}
	if($Fail == false)
	{
		if(mysql_num_rows($busqueda) > 0)
		{
		mysql_select_db($database_conexion, $conexion);
		$LoginRS__query="SELECT id, nombre, password,rpassword, email FROM usuarios WHERE nombre='$username' AND password='$password'";
		$LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
		$row_ObtenerDeuser = mysql_fetch_assoc($LoginRS);
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $row_ObtenerDeuser['id'];	
			header("Location: ".$_SESSION['username']);
		}
	}
}	
?>
</form>
</div>
</body>
</html>