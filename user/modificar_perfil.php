<?php require_once('../Connections/conexion.php'); ?>
<?php
/* Aquí tienes la página donde ingresas los datos */ 
@$id = $_SESSION['id']; 

$request = mysql_query("SELECT * FROM usuarios WHERE id = '$id'"); 
$row = mysql_fetch_assoc($request); 
?>
<form method="POST" action="modificar_perfil.php"> 
<table> 
<tr> 
<td>Nombre de Usuario</td><td><?php echo $row["nombre"]; ?></td>
</tr> 
<tr> 
<td>Contraseña</td><td><input type="password" name="password" value="<?php echo $row["password"]; ?>" /> </td>
</tr> 
<tr> 
<td>Verificar Contraseña</td><td><input type="password" name="rpassword" value="<?php echo $row["rpassword"]; ?>" /> </td>
</tr> 
<tr> 
<td>Email</td><td><input type="text"  name="email" value="<?php echo $row["email"]; ?>"  tabindex="1" maxlength="200" /> </td>
</tr> 
<tr><td></td><td><input type="submit" value="Guardar Datos" /> 
</table>  
						<?php
							if(isset($_POST['password']) && isset($_POST['rpassword']) && isset($_POST['email']))
							{
								$password = $_POST['password'];
								$rpassword = $_POST['rpassword'];
								$email = $_POST['email'];
								$Fail = false;

							  if(strlen($password) < 4 || strlen($password) > 35) {
							  die('<span style="color:red;">La contraseña debe tener entre 4 y 35 carácteres</span>');
							  }
							  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
							  die('<span style="color:red;">Email incorrecto</span>'); 
							  }
								elseif(empty($password) || empty($rpassword))
								{
									echo '<span style="color:red;">Algun dato esta vacio</span>';
									$Fail = true;
								}
								elseif($rpassword !== $password)
								{
									echo '<span style="color:red;">Las contraseñas no son iguales</span>';
									$Fail = true;
								}
								if($Fail == false)
								{
								$password = md5($password);
								$rpassword = md5($rpassword);
								mysql_query("UPDATE usuarios SET password='$password',rpassword='$rpassword', email = '$email' WHERE id = $id"); 
								header("Location: ../".$_SESSION['username']);
								}
							}
							?>
							</form>