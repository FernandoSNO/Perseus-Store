 <?php 
require("conexion.php");
include ('redimensionar_imagen.php');
if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['categoria'])){
	

		# code...

	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$categoria = $_POST['categoria'];

	if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
			$nbr_imagen=time()."-".$_FILES['imagen']['name'];
			move_uploaded_file($_FILES['imagen']['tmp_name'],$nbr_imagen);
/*Redimensionar imagen*/
			$nombre_imagen=redimensionarImagen($nbr_imagen, 300, 320);
			unlink($nbr_imagen);
		}else{
			$nombre_imagen="";
		}
		
	$sql = "INSERT INTO productos(nombre,precio,categoria,imagen)
	                              VALUES ('$nombre','$precio','$categoria','$nombre_imagen')";
	
	if($conexion->query($sql)===true){
				header('Location: cargaproducto.php'); 

	}
	else{
		die("Error al insertar datos" .$conexion->error);
	}
}

		
?>