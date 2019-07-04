

<?php/* ARCHIVO CONFIG.PHP */
$db_username = 'root';
$db_password = '';
$db_name = 'secure_login';
$db_host = 'localhost';

$db = new mysqli($db_host, $db_username, $db_password,$db_name) or die('No puedo conectarme a la base de datos');
?>