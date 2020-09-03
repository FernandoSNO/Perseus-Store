<?php require_once 'Controllers/authController.php';
if(isset($_SESSION['id'])){ header('location:perfil.php');}
else{
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrarse</title>
	<!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/formularios.css">
    <link rel="icon" href="img/perseus-ico.png">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
    
	
	<header>
		<div class="logo">
			<a href="index.php"><img src="img/perseus.png" width="150" alt=""></a>			
		</div>
  	</header>
	

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
			    <form action="registrarse.php" method="post">
			    	<h3 class="text-center">Registrarse</h3>
			    	<?php if(count($errors) >0):?>
			    	<div class="alert alert-danger">
			    		<?php foreach($errors as $error):?>
			    		<li><?php echo $error; ?></li>
 						<?php endforeach; ?>
			    	</div>
 					<?php endif;?>
                    <div class="form-group">
                    	<label for="usuario">Nombre de usuario</label>
                    	<input type="text" name="usuario" class="form-control form-control-lg" value="<?php echo $usuario ?>">
                    </div>
                    <div class="form-group">
                    	<label for="email">Email</label>
                    	<input type="email" name="email" class="form-control form-control-lg" value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                    	<label for="contraseña">Contraseña</label>
                    	<input type="password" name="contraseña" class="form-control form-control-lg">
                    </div>
                     <div class="form-group">
                    	<label for="contraseña">Confirmar Contraseña</label>
                    	<input type="password" name="contraseñaConf" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                    	<button type="submit" name="registrarse-btn" class="btn btn-primary btn-block btn-lg">Registrarse</button>
                    </div>
                    <p class="text-center">¿Ya tienes cuenta?<a href="inicio-sesion.php">Iniciar Sesión</a></p>
			    </form>
			</div>
		</div>
	</div>

</body>
</html>
<?php } ?>