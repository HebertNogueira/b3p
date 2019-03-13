<?php
	if($_POST['tipoPergunta'] != null){
	
		$tipoPergunta = $_POST['tipoPergunta'];	

		$disciplina = $_POST['disciplina'];	

		$Codigo = $_POST['Codigo'];	

		$dificuldade = $_POST['dificuldade'];	

		$Alternativas = $_POST['Alternativas'];	

		
		$queryFiltro = "select * from questoes";
		$check = false;

		if ($tipoPergunta != "00"){
			$queryFiltro = $queryFiltro . " where tipoq='$tipoPergunta'";
			$check = true;		
		}
		if ($disciplina != "00"){
			if ($check == true) $queryFiltro = $queryFiltro . " and ";
			if ($check == false) $queryFiltro = $queryFiltro . " where ";
			$queryFiltro = $queryFiltro . " disciplina='$disciplina'";	
			$check = true;
		}
		if ($Codigo != ""){
			if ($check == true) $queryFiltro = $queryFiltro . " and ";
			if ($check == false) $queryFiltro = $queryFiltro . " where ";
			$queryFiltro = $queryFiltro . " codQuestao='$Codigo'";	
			$check = true;		
		}
		if ($dificuldade != "00"){
			if ($check == true) $queryFiltro = $queryFiltro . " and ";
			if ($check == false) $queryFiltro = $queryFiltro . " where ";
			$queryFiltro = $queryFiltro . " dificuldade='$dificuldade'";
			$check = true;
		}
		if ($Alternativas != "00"){
			if ($check == true) $queryFiltro = $queryFiltro . " and ";
			if ($check == false) $queryFiltro = $queryFiltro . " where ";
			$queryFiltro = $queryFiltro . " qtdAlternativa='$Alternativas'";	
		}
		
		$dadosFiltro= mysqli_query($conecta,$queryFiltro) or die(mysql_error($conecta));
		$resultFiltro = mysqli_fetch_assoc($dadosFiltro);	
		
	}
?>