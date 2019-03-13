<?php
	session_start();	
	
	error_reporting(E_ALL ^ E_NOTICE); 	//Ative em DESENVOLVIMENTO para reportar erros
	#error_reporting(0);				//Ative em PRODUÇÃO para suprimir erros

	//Verificação de login
	
	if((!isset($_SESSION['logado'])) || ($_SESSION['logado']=="NEUTRAL") || ($_SESSION['logado']=="NAO") ){
		include "sair.php";
	} 
	
	//borda para os TABLES
	$borda = "0";
?>