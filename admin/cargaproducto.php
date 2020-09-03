<?php include("conexion.php");
session_start();
if (!isset($_SESSION['verify'])) {
	header('location:index.php?verify=0');
}
else if ($_SESSION['verify'] != 1)
{
	header('location:index.php?verify=2');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../estilos.css">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>Documento sin título</title>
</head>

<body>

	<header>
	<div class="logo">
				<a href="../index.php"><img src="../img/perseus.png" width="150" alt=""></a>			
	</div>
	</header>

	<center>
			<h2 class="titulo">Agregar Productos</h2>
		<form class="iniciar" action="insertar.php" method="POST" enctype="multipart/form-data">

			<input type="text" placeholder="Nombre producto" required name="nombre"><br>
			<input type="text" placeholder="Precio" required name="precio"><br>
			<div class="select">
            <select name="categoria">
            	<option value="">Selecciona la categoría</option>
				<option value="abrigos">Abrigos</option>
				<option value="camisas">Camisas</option>
				<option value="pantalones">Pantalones</option>
				<option value="relojes">Relojes</option>
				<option value="sacos">Sacos</option>
				<option value="zapatos">Zapatos</option>
	        </select>    
	        </div>
			<input type="file" required name="imagen"><br><br>
			<input type="submit" value="Insertar">

		</form>


     <table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Categoría</th>
			<th>Imagen</th>
			<th>Acción</th>
		</tr>
    </thead>

		<?php 

	    
    	$sql="SELECT * FROM productos";
   
         
		$result=mysqli_query($conexion,$sql);
		while($mostrar=mysqli_fetch_array($result)){
			
		 ?>
        
		<tr>
			<td><?php echo $mostrar['id_producto'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['precio'] ?></td>
			<td><?php echo $mostrar['categoria'] ?></td>
		    <td><img width="50px"src="img/<?php echo $mostrar['imagen'] ?>"></td>
			<td><p><a href="editar.php?id_producto=<?php echo $mostrar['id_producto'] ?>">Editar</a> | 
				<a href="eliminar.php?id_producto=<?php echo $mostrar['id_producto']?>"

					onclick="if (confirm('¿Seguro que desea eliminar?'))
					{
						return true;
					}else{
						event.stopPropagation(); event.preventDefault();
					};"
					 title="Link Title">Eliminar</a> </p></td>
			
		</tr>

        
	<?php 
	
	}

	 if (isset($_GET['id_borrar'])) {
		include("borrar.php");
	}
	 ?>
	</table>
    </center> 

</script>	
</body>
</html>