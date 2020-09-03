 	<header>
 		<head><link rel="stylesheet" type="text/css" href="css/menu.css"></head>
			<div class="logo">
				<a href="index.php"><img src="img/perseus.png" width="150" alt=""></a>
				
			</div>


        <nav>
        <div id="logo">

      <form action="productos.php">
     <form id="demo-2">
	<input type="search" placeholder="Buscar..." name="buscar">
	</form>
    </form>    

        </div>

        <label for="drop" class="toggle"><img src="img/barra.png"></label>
        <input type="checkbox" id="drop" />
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle">Categoria</label>
                    <a href="#">Categoria</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li><a href="productos.php">Todo</a></li>
						<li><a href="productos.php?categoria=Abrigos">Abrigos</a></li>
						<li><a href="productos.php?categoria=Camisas">Camisas</a></li>
						<li><a href="productos.php?categoria=Relojes">Relojes</a></li>
						<li><a href="productos.php?categoria=Sacos">Sacos</a></li>
						<li><a href="productos.php?categoria=Zapatos">Zapatos</a></li>
                    </ul> 

                </li>
                <li>
                <!--Primer nivel desplegable - -->
                <li><a href="productos.php">Productos</a></li>
                <li>

                	<?php if(isset($_SESSION['id'])){

                		echo '<a href="perfil.php">Perfil</a>'; } 
                		else{
                			echo '<a href="inicio-sesion.php">Ingresar</a>';
                		}

                	?>
                </li>
				<li><a href="carrito.php">Carrito</a></li>
            </ul>
        </nav>


	</header>

   