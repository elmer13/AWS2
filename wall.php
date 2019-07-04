<?php
/*
 * CREATE DATABASE wall;
 * CREATE TABLE message (id int AUTO_INCREMENT , message tinytext, date timestamp, PRIMARY KEY(id));
 * 
 */

//Conecto al servidor
$cx = mysql_connect("localhost", "root", "") or die("Error connect: ".mysql_error());
 
//Seleccion la base de datos
mysql_select_db("secure_login") or die("Error select db: ".mysql_error());

//Realizo la consulta de la tabla y ordeno por fecha (El ultimo mensaje de primero)
$query = mysql_query("SELECT * FROM message ORDER BY date DESC", $cx);

//Muestro los mensaje en una lista desordenada
echo '<ul id="message">';
//Si la consulta es verdadera
if($query == true){
   //Recorro todos los campos de la tabla y los muestro
   while ($row = mysql_fetch_array($query)){
      echo "<li><p>".$row['message']." <span id=\"date\">".$row['date']."</span></li>";
   }
}
echo '</ul>'
?>

<?php
//Defino mi variable mensaje
@$msg = $_POST['msg'];

//Si no esta vacia
if(!empty($msg)){
   //Conecto con la base de datos
   $cx = mysql_connect("localhost", "root", "") or die("Error connect: ".mysql_error());
   //Selecciono la base de datos
   mysql_select_db("secure_login") or die("Error select db: ".mysql_error());
   //Inserto el mensaje al tabla
   mysql_query("INSERT INTO message (message) VALUES ('".$msg."')", $cx);
}
?>