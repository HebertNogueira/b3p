<?php
	include "config.php";
	
	$tipo = $_POST['tipoPergunta'];
	
	if ($tipo == 'AT'){
		
		session_start();
		$_SESSION['tipo'] = 'AT';
		header('location: perguntas_alternativas/index.php');

	}
	if ($tipo == 'LC'){
		
		session_start();
		$_SESSION['tipo'] = 'LC';
		header('location: perguntas_lacunas/index.php');

	}	
	if ($tipo == 'DS'){
		
		session_start();
		$_SESSION['tipo'] = 'DS';
		header('location: perguntas_dissertativas/index.php');

	}	
	if ($tipo == 'VF'){
		
		session_start();
		$_SESSION['tipo'] = 'VF';
		header('location: perguntas_verdadeirofalso/index.php');

	}	
	
	else echo'nada à fazer!';
	 
?>
