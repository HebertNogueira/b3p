<?php
	if (!isset($conecta)){
		include "sair.php";
	} else {
		mysqli_close($conecta);
	}
?>