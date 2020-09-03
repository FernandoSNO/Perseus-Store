<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" type="text/css" href="../estilos.css">
<title>Editar producto</title>
</head>

<body>
	 <?php   
	    include 'redimensionar_imagen.php';
        $id=$_REQUEST['id_producto'];
        require("conexion.php");
        $sql="SELECT * FROM productos WHERE id_producto=$id";
   
         
		$result=mysqli_query($conexion,$sql);
		$mostrar=mysqli_fetch_array($result);
			
		 ?>
             
		<center>
			<h2 class="titulo">Agregar Productos</h2>
		<form class="iniciar" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $mostrar['id_producto'] ?>"> 
			<input type="text" placeholder="Nombre producto" required name="nombre" value="<?php echo $mostrar['nombre']?>"><br>
			<input type="text" placeholder="Precio" required name="precio" value="<?php echo $mostrar['precio']?>"><br>
			 <select name="categoria">
            	<option value="<?php echo $mostrar['categoria']?>"><?php echo $mostrar['categoria']?></option>
				<option value="abrigos">Abrigos</option>
				<option value="camisas">Camisas</option>
				<option value="relojes">Relojes</option>
				<option value="sacos">Sacos</option>
				<option value="zapatos">Zapatos</option>
	        </select>    
	        </div>
			<input type="file" name="imagen"><br><br>
			<input type="submit" value="Insertar">

		</form>
</center>

<?php

if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['categoria'])){
$id=$_REQUEST['id_producto'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$carpetaDestino="img/"; 


if(!empty($_FILES["imagen"]["name"]))

    {  

    	$query=mysqli_query($conexion,"select * from productos WHERE id_producto=$id");
        $row=mysqli_fetch_array($query);


	
		unlink("img/".$row['imagen']);

		    

			$nbr_imagen=time()."-".$_FILES['imagen']['name'];
			move_uploaded_file($_FILES['imagen']['tmp_name'],$nbr_imagen);
/*Redimensionar imagen*/

			$nombre_imagen=redimensionarImagen($nbr_imagen, 300, 320);
			unlink($nbr_imagen);
			mysqli_query($conexion,"UPDATE productos SET imagen='".$nombre_imagen."' WHERE id_producto='".$id."'"); 	
		}else{
			$nombre_imagen="";
		}

$sql2 = "UPDATE productos SET nombre='".$nombre."', precio='".$precio."', categoria='".$categoria."' WHERE id_producto='".$id."'";

if($conexion->query($sql2)===true){
	    header('location:cargaproducto.php');
	}
	else{
		die("Error al modificar datos" .$conexion->error);
	}
}

?>

</body>
</html>
