<?php 

function agregarPrimerProducto($id){
    include 'admin/conexion.php';
	$sql="SELECT * FROM productos WHERE id_producto=".$id."";
	$resultado=$conexion->query($sql);
	while($registro=$resultado->fetch_array()){
		
		$Id_prod=$registro['id_producto'];
		$nombre=$registro['nombre'];
		$Precio=$registro['precio'];
		$Img=$registro['imagen'];
		$Cantidad=1; //por ser la primera vez que cargo el producto
	}
	$prods_compra[]=array('id'=>$Id_prod,
		'precio'=>$Precio,'nombre'=>$nombre,'imagen'=>$Img,'cantidad'=>$Cantidad);
	//CREAMOS LA VARIABLE DE SESSION $_SESSION['carrito']
		$_SESSION['carrito']=$prods_compra;	
	$resultado->free();
	$conexion->close();
}
function mostrarProductosCarrito(){
	//a veces llamamos a la funcion y el carrito ya no existe por ejemplo porque
	// eliminamos el ultimo producto por lo cual eliminamos la variable de sesion carrito
	if(!isset($_SESSION['carrito'])){
	echo '<p>carrito vacio<p> <br>';	
	}else{
	$total=0;
	$prods_compra=$_SESSION['carrito'];
	echo '<br>';
	foreach ($prods_compra as  $indice => $producto) {
		echo '<div class="prod-carrito">';
		?>
			<img width="70px" src="admin/img/<?php echo $producto['imagen'] ?>" alt="">
		<?php
			
			echo '<p>'.$producto['nombre'].'</p>';	
			echo '<p>$'.$producto['precio'].'</p>';
			echo '<p>cantidad: '.$producto['cantidad'].'</p>';
		
	if($prods_compra[$indice]['cantidad']>1){
	echo '<a href="carrito.php?id_resta='.$prods_compra[$indice]['id'].'">- | </a> ';
	echo '<a href="carrito.php?id_suma='.$prods_compra[$indice]['id'].'">+</a> ';
	}else{
	echo '<a href="carrito.php?id_suma='.$prods_compra[$indice]['id'].'">
	+ </a>';
	}
	echo '<a class="borrar" href="carrito.php?id_borra='.$prods_compra[$indice]['id'].'">
			X </a> <br><br>';
	echo 'Subtotal: $'.$prods_compra[$indice]['cantidad']*$prods_compra[$indice]['precio'];
	echo '<br>';
	echo '</div>';
	$total=$total+($prods_compra[$indice]['cantidad']*$prods_compra[$indice]['precio']);
	}
	echo 'TOTAL COMPRA $'.$total.'<br><br>';
	}
}
function buscarSiProductoExite($id){
	$prods_compra=$_SESSION['carrito'];
	$existe=0;
	foreach ($prods_compra as $indice => $producto) {
		if($producto['id']==$id){
			$existe=1;
			$prods_compra[$indice]['cantidad']++;
		}
	}
	$_SESSION['carrito']=$prods_compra;
	return $existe;		
}
function agregarNuevoProducto($id){
	$prods_compra=$_SESSION['carrito'];
	include("admin/conexion.php");
	$sql="SELECT * FROM productos WHERE id_producto=".$id."";
	$resultado=$conexion->query($sql);
	while($registro=$resultado->fetch_array()){
		$Id_prod=$registro['id_producto'];
		$nombre=$registro['nombre'];
		$Precio=$registro['precio'];
		$Img=$registro['imagen'];
		$Cantidad=1; //por ser la primera vez que cargo el producto
	}
	$nuevo_prod=array('id'=>$Id_prod,'nombre'=>$nombre,'precio'=>$Precio,'imagen'=>$Img,
		'cantidad'=>$Cantidad);
		array_push($prods_compra, $nuevo_prod);
		$_SESSION['carrito']=$prods_compra;
	$resultado->free();
	$conexion->close();
}
function sumarCantidad($id){
	$prods_compra=$_SESSION['carrito'];
	foreach ($prods_compra as $indice => $producto) {
		if($producto['id']==$id){
			$prods_compra[$indice]['cantidad']++;
		}
	}
	$_SESSION['carrito']=$prods_compra;
}
function restarCantidad($id){
	$prods_compra=$_SESSION['carrito'];
	foreach ($prods_compra as $indice => $producto) {
		if($producto['id']==$id){
			$prods_compra[$indice]['cantidad']--;
		}
	}
	$_SESSION['carrito']=$prods_compra;
}

function eliminarProdCarrito($id){
	$prods_compra=$_SESSION['carrito'];
	foreach ($prods_compra as $indice => $producto) {
		if($producto['id']==$id){
			unset($prods_compra[$indice]);
		}
	}
	// hay que fijarse si el carrito esta vacio 
	//eliminar la variable de sesion carrito
	if(count($prods_compra)>0){
	$_SESSION['carrito']=$prods_compra;
	}else{
		unset($_SESSION['carrito']);
	}
}

function confirmarCompra(){
	$prods_compra=$_SESSION['carrito'];
	$total=0;
	foreach ($prods_compra as  $indice => $producto) {
			echo $producto['nombre'].'<br>';
			echo 'precio: $'.$producto['precio'].'<br>';
			echo 'cantidad: '.$producto['cantidad'].'<br>';
			echo 'Subtotal: $'.$prods_compra[$indice]['cantidad']*$prods_compra[$indice]['precio'].'<br><br>';

		    $total=$total+($prods_compra[$indice]['cantidad']*$prods_compra[$indice]['precio']);
	}
	echo 'TOTAL COMPRA $'.$total.'<br><br>';
}

function comprar(){

	include("admin/conexion.php");
	$fecha=date("Y-m-d");
	$usuario=$_SESSION['id'];
	echo $fecha.'<br>';
	$sql="INSERT INTO ventas (fecha, id_usuario) VALUES ('$fecha','$usuario')";
	$insert=$conexion->query($sql);
	

	$sqlc="SELECT id_venta FROM ventas ORDER BY id_venta desc LIMIT 1,1";
	$consulta=$conexion->query($sqlc);
	$registro=$consulta->fetch_array();
	echo $registro[0];
	$id_venta=$registro[0];

	$prods_compra=$_SESSION['carrito'];
	$total=0;
	foreach ($prods_compra as $indice => $producto) {
		$id_prod=$producto['id'];
		$precio=$producto['precio'];
		$cantidad=$producto['cantidad'];

		$sqli="INSERT INTO prodxventas (id_venta, id_prod, precio_u, cant) VALUES ('$registro[0]','$id_prod','$precio','$cantidad')";
		$insertar=$conexion->query($sqli)? print("ok"): print("Ups, :(");

		$total=$total+($prods_compra[$indice]['precio']*$prods_compra[$indice]['cantidad']);
	}
	
	$sql="UPDATE ventas SET total='$total'";
	$actualizar=$conexion->query($sql)? print("ok"): print("Ups, :(");
	}

?>