<?php
	include "../config.php";
	include "../connect.php";
	$gravou=='false';
	
	if(!isset($_POST['codigo']) || !isset($_POST['rgm']) || !isset($_POST['nome']) || !isset($_POST['mail']) ) {
		//Enviar para Index; 
	}else{

	$codigo = $_POST['codigo'];
	$rgm = $_POST['rgm'];
	$nome = $_POST['nome'];
	$mail = $_POST['mail'];
	$coordena = "";
	$ativo = "";
	
	if(!isset($_POST['coordena'])) {
		$coordena = "N";
	} else {
		if($_POST['coordena'] == 'on') {
		$coordena = "S";
		} 	
	}

	if(!isset($_POST['ativo'])) {
		$ativo = "N";
	} else {
		if($_POST['ativo'] == 'on') {
		$ativo = "S";
		} 	
	}
	//echo $codigo ." - ". $rgm  ." - ". $nome ." - ".   $mail  ." - Coordena ".  $coordena  ." - ativo ". $ativo ;	
	//echo "UPDATE usuarios SET nome = $nome , email = $mail, coordena = $coordena, ativo = $ativo WHERE usuarios codigo = $codigo;";
	//$sqlUpdate = sprintf("UPDATE qtipo SET tipominimo=$minimo_AT,tipomaximo=$maximo_AT where tipoq='AT'");
	$queryUP = sprintf("UPDATE usuarios SET nome = '$nome', email='$mail', coordena='$coordena', ativo='$ativo' WHERE codigo='$codigo'");
	echo $queryUP;
	$rsCarregaDados = mysqli_query($conecta,$queryUP) or die(mysql_error());
	$gravou=='true';
	if ($gravou=='true'){
		header('location: pesquisar.php');
	}else{
		header('location: pesquisar.php');
		}
	
	}
?>