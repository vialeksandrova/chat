<?php
$db_connection=mysqli_connect('localhost','root','','chat');
if(!db_connection) {
echo 'Database is not exist.';
}

mysqli_set_charset($db_connection, 'utf8');//базата данни работи на utf8 
mb_internal_encoding('UTF-8');
?>
