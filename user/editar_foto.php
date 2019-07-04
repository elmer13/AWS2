
<?php
require_once('../Connections/conexion.php'); 

if(isset($_POST['upload'])){

	// Definimos variables generales
	define("maxUpload", 500000);
	define("maxWidth", 1000);
	define("maxHeight", 1000);
	define("fileName", 'avatar_');

	// Tipos MIME
	$fileType = array('image/jpeg','image/pjpeg','image/png');

	// Bandera para procesar imagen
	$pasaImgSize = false;

	//bandera de error al procesar la imagen
	$respuestaFile = false;

	// nombre por default de la imagen a subir
	$archivo = '';

	// obtenemos los datos del archivo
	$tamano = $_FILES["userfile"]['size'];
	$tipo = $_FILES["userfile"]['type'];
	$archivo = $_FILES["userfile"]['name'];
	$tmpName = $_FILES['userfile']['tmp_name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);

	$fp = fopen($tmpName, 'r');
	$content = fread($fp, $tamano);
	$content = addslashes($content);
	fclose($fp);

	if(!get_magic_quotes_gpc())
	{
	$archivo = addslashes($archivo);
	}

	// Verificamos la extensión del archivo independiente del tipo mime
	$extension = explode('.',$archivo);
	$num = count($extension)-1;

	// Creamos el nombre del archivo dependiendo la opción
	// guardamos el archivo a la carpeta files
	$imgFile = fileName.$prefijo.'.'.$extension[$num];
	$destino = "avatar/".$imgFile;
	$sql = $imgFile;
		if ($archivo != "") {

		// Tamaño de la imagen
		$imageSize = getimagesize($tmpName);

		// Verificamos el tamaño válido para los logotipos
		if($imageSize[0] < maxWidth && $imageSize[1] < maxHeight)
			$pasaImgSize = true;

		// Verificamos el status de las dimensiones de la imagen a publicar
		if($pasaImgSize == true){

				// Verificamos Tamaño y extensiones
			if(in_array($tipo, $fileType) && $tamano>0 && $tamano<=maxUpload && ($extension[$num]=='jpg' || $extension[$num]=='png')){

				if (copy($tmpName,$destino)) {
				@$id=$_SESSION['id'];
					move_uploaded_file($tmpName,$destino);
					$result = mysql_query("INSERT INTO upload (name, size, type, content ) VALUES ('$archivo', '$tamano', '$tipo', '$content')");
					$result = mysql_query("UPDATE usuarios SET avatar='$sql' WHERE id='$id'");
					header("Location: ../".$_SESSION['username']);
				} else {
					echo "<script language='JavaScript'> alert('Error al subir el archivo'); </script>";
				}
			} else {
					// Error en el tamaño y tipo de imagen
				echo "<script language='JavaScript'> alert('Verifique el tamaño y tipo de imagen'); </script>";
			}
		}else{
			// Error en las dimensiones de la imagen
			echo "<script language='JavaScript'> alert('Verifique las dimensiones de la Imagen'); </script>";
		}
	}else{
			echo "<script type=\"text/javascript\"> alert('Archivo Vacio'); </script>";
	}
} 
?>
