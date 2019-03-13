<?php
	include "../config.php";
	include "../connect.php";
	
	$nome = $_POST['nome'];
	$rgm = $_POST['rgm'];
	//$coordena = $_POST['coordena'];
	$mail = $_POST['mail'];
	$senha = $_POST['senha'];
	
	$converCoorderna = 0;
	$gravou = 'false';
	
	echo $gravou;
	
		//abrindo conexao com o banco.

		$queryCadastra = "INSERT INTO usuarios (rgm,nome,email,senha,coordena) VALUES ('$rgm','$nome','$mail','$senha','$converCoorderna')";
		echo $queryCadastra;
		$exeq = mysqli_query($conecta,$queryCadastra) or die(mysql_error());
		$gravou = 'true';
		
		//fechando Conexão com o banco.
		
	if ($gravou=='true'){
		$_SESSION ['gravou'] = $gravou;
		$_SESSION ['rgm'] = $rgm;
		header('location: incluir.php');
	}else{
		$_SESSION ['gravou'] = $gravou;
		header('location: incluir.php');
	} 	
?>
