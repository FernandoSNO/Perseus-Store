<?php  
if (isset($_GET['categoria']) && $_GET['categoria']!='todos') {
	$categoria=$_GET['categoria'];
	$sql="SELECT * FROM productos WHERE categoria='".$categoria."' ORDER BY nombre ASC";
}

if(!isset($_GET['categoria']) && !isset($_GET['buscar']) || isset($_GET['categoria']) && $_GET['categoria']=='todos'){
	$sql="SELECT * FROM productos ORDER BY nombre ASC";
}

if(isset($_GET['buscar'])){
	$buscar=$_GET['buscar'];
	$sql="SELECT * FROM productos WHERE nombre LIKE '%$buscar%' OR categoria LIKE '%$buscar%' ORDER BY nombre ASC";
}

?>