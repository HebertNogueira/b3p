<?php
	if (!isset($borda)){
		include "sair.php";
	} else { 
		$conecta = @mysqli_connect("127.0.0.1", "%%USUARIO%%","%%SENHA%%","B3P") OR die ('<h1>Não foi possível conectar ao banco'); 
		mysqli_set_charset($conecta,"utf8");
	}
?>