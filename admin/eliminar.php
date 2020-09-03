<?php require 'conexion.php';

$id=$_GET['id_producto'];

$sql="SELECT * FROM productos WHERE id_producto='".$id."'";

$consulta=mysqli_query($conexion,$sql);
$registro=mysqli_fetch_assoc($consulta);

if (!empty($registro['imagen'])) {
	unlink("img/".$registro['imagen']);
}

	
	$sql = "DELETE FROM productos WHERE id_producto='".$id."'";
	
	if($conexion->query($sql)===true){
				header('Location: cargaproducto.php'); 

	}
	else{
		die("Error al insertar datos" .$conexion->error);
	}
	
 ?>