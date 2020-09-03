<?php
session_start();
 require_once("admin/conexion.php");
require_once("filtros.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Productos</title>
<link rel="stylesheet" href="estilos.css">
<link rel="icon" href="img/perseus-ico.png">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>

<body>
   
  <?php include('header.php');?>
		
	<div class="banner_productos">
		<?php
		if(isset($_GET['categoria'])){
				echo '<img src="img/'.$_GET['categoria'].'.jpg"alt="">'; 
			 }
		else{
			echo '<img src="img/todos.jpg" alt="">';
		}
		?>
	</div>
	
	<center>
		<?php  
			if (isset($_GET['buscar'])) {
				echo '<h2>'.$_GET['buscar'].'</h2>'; 
			}
			
		?>
	<section class="main-productos">
			
		<?php 
	
		include('productos_bd.php');  ?>
			
	</section>
	</center>
	
	<?php include('footer.php');  ?>

</body>
</html>
