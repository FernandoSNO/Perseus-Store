<?php 
include 'Controllers/authController.php';
if(!isset($_SESSION['id'])){
	header('location: inicio-sesion.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil Usuario</title>
	<!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="icon" href="img/perseus-ico.png">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
    <?php include 'header.php';?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
               <?php if(isset($_SESSION['message'])): ?>
			    <div class="alert <?php echo $_SESSION['alert-class'];?>">
			    	<?php 
			    	echo $_SESSION['message'];
			    	unset($_SESSION['message']);
			    	unset($_SESSION['alert-clas']);
			    	?>
			    </div>
			   
 				<?php endif; ?>
		    <h3>¡Bienvenido, <?php echo $_SESSION['username'];?>!</h3>

			    <a href="perfil.php?logout=1" class="logout">Cerrar Sesión</a>
<!-- 
			    <?php if(!$_SESSION['verified']): ?>
			    <div class="alert  alert-warning">
                Necesitas verificar tu cuenta.
                Revisa tu cuenta de email. Hemos enviado un mensaje con el código de verificación.
                <strong><?php echo $_SESSION['email'];?></strong>
			    </div>
				<?php endif;?>
               	
               	<?php if($_SESSION['verified']): ?>
                <button class="btn btn-block btn-lg btn-primary"> Estás verificado (:</button>
            <?php endif;?> -->
            
			</div>
		</div>
	</div>

	<style type="text/css">
		h3{
			font-size{
				1.3em;
			}
		}
		a{
			text-decoration: none;
			color: #0691CB;
		}

 		.container{
 			width: 100%;
 			max-width: 267px;
 			margin:auto;
 		}
	</style>

</body>
</html>
