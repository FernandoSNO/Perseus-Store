<?php

session_start();

require_once("admin/conexion.php");
require_once("filtros.php");

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/perseus-ico.png">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title>Perseus</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>

    <?php include('header.php');  ?>

	
    
 	<img class="banner" src="img/banner.png">
	
	<div class="main"> 

 	<article>

 		<div class="elemento_1a">
 		 	<div><a href="productos.php?categoria=sacos">

 		 		<div class="container1">
 		 		<div class="div-img hidden" >
   				<img class="img" src="img/sacos_ini.jpeg">	
  				</div>
  				</div>

 		 	</a> </div>
			
			<div class="vermas"> <h2 >Sacos Elegantes <br><br><a href="productos.php?categoria=sacos">Ver más</a></h2></div>
			
 		</div>
        
 		<div>
 		    <div><a href="producto_x.php?id_producto=16">
 		 		<img  src="img/saco_ini.jpg">	
  			</a></div>
 		    <a href="producto_x.php?id_producto=16"> <h2>Saco Gris <br> $1200</h2></a>
 		</div>

 	</article>
    
    <article>

    	
 	
		
      

		
		<div>
			
 		 	<a href="producto_x.php?id_producto=17"><img src="img/reloj_ini.jpg"></a>
 		 	<a href="producto_x.php?id_producto=17"> <h2>Reloj Negro <br>$1399</h2></a>
			
 		</div>
        
			<div class="elemento_1b">
			
				<div class="vermas"> <h2>Relojes modernos<br><br><a href="productos.php?categoria=relojes">Ver más</a> </h2> </div>
			
 		    <a href="productos.php?categoria=relojes">
 		    	<div class="container1">
 		 		<div class="div-img hidden" >
   				<img class="img" src="img/relojes_ini.jpg">	
  				</div>
  				</div> 
 		    </a>
			
		
			
 		</div>
        
		

    </article>
    
	<article>

 		<div class="elemento_1a">
 		 	<div><a href="productos.php?categoria=zapatos">
 		 		<div class="container1">
 		 		<div class="div-img hidden" >
   				<img class="img" src="img/zapatos_ini.jpg">	
  				</div>
  				</div> 
 		 	</a> </div>
			
			<div class="vermas"> <h2 >Zapatos de alta calidad <br><br><a href="productos.php?categoria=zapatos">Ver más</a></h2></div>
			
 		</div>
        
		     


 		<div>
 		    <div><a href="producto_x.php?id_producto=15"><img src="img/zapato_ini.jpg"></a></div>
 		    <a href="producto_x.php?id_producto=15"> <h2>Zapato Dino Butelli <br>$1700</h2></a>
 		</div>

 	</article>


 </div>
   
   <?php include('footer.php');  ?>


</body>
</html>