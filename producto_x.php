<?php
session_start();
include("admin/conexion.php");	
$id=$_GET['id_producto'];
$sql="SELECT * FROM productos WHERE id_producto='".$id."'";
$resultado=mysqli_query($conexion, $sql);
$fila=mysqli_fetch_assoc($resultado);
	
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $fila['nombre'] ?> </title>
<link rel="stylesheet" type="text/css" href="estilos.css">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link rel="icon" href="img/perseus-ico.png">
</head>

<body>
	<?php include("header.php");?>	

	<div class="main-productos">


		<div class="izq_producto">
		    <img src="admin/img/<?php echo $fila['imagen'] ?>" alt="">
		</div>

		<div class="der_producto">
			<h1><?php echo $fila['nombre'] ?></h1>
			<p class="precio">$ <?php echo $fila['precio']?></p>
			<a  href="carrito.php?id=<?php echo $fila['id_producto']?>" class="agregar-al-carrito"><p>Agregar al carrito</p></a>
	
		</div>

	</div>
			

	<?php include("footer.php")?>
</body>
</html>