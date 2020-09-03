<?php
require('conexion.php');
if(isset($_GET['verify']))
{
	if($_GET['verify'] == 0)
	{
		echo '<script type="text/javascript">alert("Por favor autorice su acceso primero.");</script>';
	}
	else if($_GET['verify'] == 2)
	{
		echo '<script type="text/javascript">alert("Un error extraño ha ocurrido: Por favor autorice su acceso.");</script>';
	}

	else{
		header('location:cargaproducto.php');
	}

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/formularios.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="icon" type="image/x-icon" href="../img/perseus-ico.png" />
    <title>Autorización</title>
</head>
<body>		   

	<div class="container">
		
		<div class="row">
			<div class="col-md-4 offset-md-4">
			    <form method="post">
			    	<h3 class="text-center">Perseus <br>Iniciar Sesión</h3>

                    <div class="form-group">
                    	<label for="usuario">Nombre de usuario</label>
                    	<input type="text" name="usuario" class="form-control form-control-lg" value="">
                    </div>
                    <div class="form-group">
                    	<label for="contraseña">Contraseña</label>
                    	<input type="password" name="password" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                    	<button type="submit" name="subir" class="btn btn-primary btn-block btn-lg">Iniciar Sesión</button>
                    </div>
			    </form>
			</div>
		</div>
	</div>

<?php if(isset($_POST['subir']))
{
	if ($_POST['usuario'] == "12345" && $_POST['password'] == "12345")
	{
		session_start();
		$_SESSION['verify']=1;
		header('location:cargaproducto.php');
	}

	else {echo '<script>alert("Datos Incorrectos. Intentelo nuevamente.")</script>';}
}?>

</body>
</html>