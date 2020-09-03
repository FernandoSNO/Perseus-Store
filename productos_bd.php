<?php
if (isset($_GET['categoria'])) {
	
}
elseif(isset($_GET['buscar'])){
	
}
else{
	
}
?>


<?php  

$consulta=mysqli_query($conexion, $sql);

if(mysqli_num_rows($consulta)>0) {
	while ($registro=mysqli_fetch_assoc($consulta)){
	
?>

			
			<a href="producto_x.php?id_producto=<?php echo $registro['id_producto']?>">
				<div class="item" height="200px">
				
			  <img src="admin/img/<?php echo $registro['imagen'];?> ">
			  <p class="items"> <?php echo $registro['nombre'] ?> </p>
			   <p class="items"> $<?php echo $registro['precio'] ?> </p>

			</div></a>

		<style>
		
			
			
			
	    </style>	

<?php  
}
}else{
	echo "<center> <br><br><br><h2>	Lo sentimos, no hay productos que coincidan con su búsqueda</h2> <br><br><br></center>";
}
?>