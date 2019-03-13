<?php
	if(isset($_POST['checkEnvio'])){
		//Checa se a POST com as informações de ALTERNATIVAS não é null e executa o update no BD
		if (($_POST['minimo_AT'] != null) && ($_POST['maximo_AT'] != null)){		
			
			$minimo_AT = $_POST['minimo_AT'];
			$maximo_AT = $_POST['maximo_AT'];
		
			$sqlUpdate = sprintf("UPDATE qtipo SET tipominimo=$minimo_AT,tipomaximo=$maximo_AT where tipoq='AT'");
					
			$queryQtipo = mysqli_query($conecta,$sqlUpdate) or die(mysql_error());
		}
		
		//Checa se a POST com as informações de DISSERTATIVAS não é null e executa o update no BD
		if (($_POST['minimo_DS'] != null) && ($_POST['maximo_DS'] != null)){
			
			$minimo_DS = $_POST['minimo_DS'];
			$maximo_DS = $_POST['maximo_DS'];
			
			$sqlUpdate = sprintf("UPDATE qtipo SET tipominimo=$minimo_DS,tipomaximo=$maximo_DS where tipoq='DS'");
			
			$queryQtipo = mysqli_query($conecta,$sqlUpdate) or die(mysql_error());
		}
		
		//Checa se a POST com as informações de LACUNAS não é null e executa o update no BD
		if (($_POST['minimo_LC'] != null) && ($_POST['maximo_LC'] != null)){		
			
			$minimo_LC = $_POST['minimo_LC'];
			$maximo_LC = $_POST['maximo_LC'];
			
			$sqlUpdate = sprintf("UPDATE qtipo SET tipominimo=$minimo_LC,tipomaximo=$maximo_LC where tipoq='LC'");
			
			$queryQtipo = mysqli_query($conecta,$sqlUpdate) or die(mysql_error());
		}
		
		//Checa se a POST com as informações de VERDADEIRO/FALSO não é null e executa o update no BD
		if (($_POST['minimo_VF'] != null) && ($_POST['maximo_VF'] != null)){		
			
			$minimo_VF = $_POST['minimo_VF'];
			$maximo_VF = $_POST['maximo_VF'];
			
			$sqlUpdate = sprintf("UPDATE qtipo SET tipominimo=$minimo_VF,tipomaximo=$maximo_VF where tipoq='VF'");
			
			$queryQtipo = mysqli_query($conecta,$sqlUpdate) or die(mysql_error());
		}
	}
?>