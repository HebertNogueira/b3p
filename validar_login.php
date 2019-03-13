<?php
	session_start();
	include "config.php";
	include "connect.php";

	$login = $_POST['login'];
	$loginLimpo = preg_replace('/[^[:alnum:]_]/', '',$login);

	$senha = $_POST['senha'];
	$senhaLimpo = preg_replace('/[^[:alnum:]_]/', '',$senha);

	$sqlLogin = sprintf("SELECT * FROM usuarios where rgm='$loginLimpo' and senha='$senhaLimpo';");
	$queryLogin = mysqli_query($conecta,$sqlLogin) or die(mysql_error());
	$resultLogin = mysqli_fetch_assoc($queryLogin);

	if($resultLogin){
		$_SESSION['logado'] = 'SIM';
		$_SESSION['rgm'] = $resultLogin['rgm'];
		$_SESSION['codigo_user'] = $resultLogin['codigo'];

		header('location: bemvindo.php');
	} else {
		$_SESSION['logado'] = 'NAO';
		header('location: index.php');
		}

	include "botton.php"
?>