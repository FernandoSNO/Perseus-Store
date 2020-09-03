<?php  

  $servidor="localhost";
  $nombreusuario="root";
  $password="";
  $db="perseus";

$conexion=new mysqli($servidor, $nombreusuario, $password, $db);

if($conexion->connect_error){
	die("Connexión fallida: " . $conexion->connect_error);
}

?>
