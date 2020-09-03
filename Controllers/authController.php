<?php
session_start();
require 'admin/conexion.php';
$errors=array();
$email="";
$usuario="";

if(isset($_POST['registrarse-btn'])){
$usuario=$_POST['usuario'];
$email=$_POST['email'];
$contraseña=$_POST['contraseña'];
$contraseñaConf=$_POST['contraseñaConf'];

if (empty($usuario)) {
	$errors['usuario']="Usuario requerido";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$errors['email']="El Email no es válido";
}

if (empty($email)) {
	$errors['email']="Email requerido";
}


if (empty($contraseña)) {
	$errors['password']="Contraseña requerida";
}

if ($contraseña!==$contraseñaConf) {
	$errors['password']="Las contraseñas no coinciden";	
}

$userQuery="SELECT * FROM users WHERE username=? LIMIT 1";
$stmt=$conexion->prepare($userQuery);
$stmt->bind_param('s',$email);
$stmt->execute();
$result=$stmt->get_result();
$userrCount=$result->num_rows;
$stmt->close();

if($userrCount>0){
	$errors['usuario']="Ya existe una cuenta con ese nombre de usuario";
}


$emailQuery="SELECT * FROM users WHERE email=? LIMIT 1";
$stmt=$conexion->prepare($emailQuery);
$stmt->bind_param('s',$email);
$stmt->execute();
$result=$stmt->get_result();
$userCount=$result->num_rows;
$stmt->close();

if($userCount>0){
	$errors['email']="El Email ya está registrado";
}

if (count($errors)===0){
	$contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
	$token=bin2hex(random_bytes(50));
	$verified=false;

	$sql="INSERT INTO users (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
	$stmt=$conexion->prepare($sql);
	$stmt->bind_param('ssbss', $usuario, $email, $verified, $token, $contraseña);

	if($stmt->execute()){
		$user_id=$conexion->insert_id;
		$_SESSION['id']=$user_id;
		$_SESSION['username']=$usuario;
		$_SESSION['email']=$email;
		$_SESSION['verified']=$verified;

		$_SESSION['message']="Te has registrado exitosamente";
		$_SESSION['alert-class']="alert-success";
		header('location:perfil.php');
		exit();
	}
	else{
		$errors['db_error']="Nombre de usuario ya en uso.";
	}
}

}

//Si el usuario presiona iniciar sesion

if(isset($_POST['inicio-sesion-btn'])){

	$usuario=$_POST['usuario'];
	$contraseña=$_POST['contraseña'];

	if (empty($usuario)) {
		$errors['usuario']="Usuario requerido";
	}


	if (empty($contraseña)) {
		$errors['password']="Contraseña requerida";
	}

	if (count($errors)===0) {
		$sql="SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
	$stmt=$conexion->prepare($sql);
	$stmt->bind_param('ss',$usuario, $usuario);
	$stmt->execute();
	$result=$stmt->get_result();
	$user=$result->fetch_assoc();

	if (password_verify($contraseña, $user['password'])) {
			
			$_SESSION['id']=$user['id'];
			$_SESSION['username']=$user['email'];
			$_SESSION['email']=$user['email'];
			$_SESSION['verified']=$verified;

			$_SESSION['message']="Has iniciado sesión";
			$_SESSION['alert-class']="alert-success";
			header('location:perfil.php');
			exit();
		}

		else{
			$errors['login_fail']="Datos incorrectos";
		}

	}

}


if (isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['id']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['verified']);
		header('location: inicio-sesion.php');
		exit();
}

?>