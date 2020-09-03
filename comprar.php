<?php
session_start();

include("Controllers/libreria.php");
	
if(isset($_SESSION['id'])){
	
}else{
	session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<meta charset="UTF-8"><title>Carrito</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<link rel="icon" href="img/perseus-ico.png">
</head>
<body>
<?php include 'header.php'; ?>
<center>
<h2>Usted esta comprando:</h2>
<?php 
if(!isset($_GET['c'])){
	confirmarCompra();
	// echo '<a href="comprar.php?c=1">Comfirmar Compra</a>';
}else{
	comprar();
}
 ?>
 </center>

</body>
</html>