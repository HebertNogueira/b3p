<?php
	include "../config.php";
	include '../connect.php';
	
	$codigoGet = $_GET['codigoGet'];
	$codigo_user = $_SESSION['codigo_user'];
	
	if($_POST['checkbox']=="alterar"){
		if($_POST['online'] == "sim") $online = "S";
		else $online = "N";
			
		$disciplina = $_POST['disciplina'];		
		$queryUpdate = sprintf("UPDATE qdisciplinas SET disciplina='$disciplina', dOnline='$online' where codDisciplina='$codigoGet'");
		$dadosUpdate = mysqli_query($conecta,$queryUpdate) or die(mysqli_error($conecta));		
	}
	
	if ($_POST['checkbox']=="inserir"){
		if($_POST['online'] == "sim") $online = "S";
		else $online = "N";
		$codigoDisciplina = $_POST['codigoDisciplina'];	
		$disciplina = $_POST['disciplina'];	
		
		$queryIncluir = sprintf("INSERT into qdisciplinas (codDisciplina,disciplina,dOnline,cadastrou) values ('$codigoDisciplina','$disciplina','$online','$codigo_user')");
		echo $queryIncluir;
		$dadosIncluir  = mysqli_query($conecta,$queryIncluir);		
	}
	if($_POST['checkbox']=="excluir"){

		$queryExcluir = sprintf("DELETE from qdisciplinas where codDisciplina='$codigoGet'");
		$dadosExcluir = mysqli_query($conecta,$queryExcluir);
	}
	
	//tratamento SESSION tipo
	$codigo = $_SESSION['tipo'];

	//pegando dados DISCIPLINA no BD
	$queryDisciplinas = sprintf("SELECT * FROM qdisciplinas");
	$dadosDisciplinas = mysqli_query($conecta,$queryDisciplinas) or die(mysql_error($conecta));
	$resultDisciplinas = mysqli_fetch_assoc($dadosDisciplinas);
	
	if($resultDisciplinas['dOnline']=="S") $selectedSim = "selected";
	else $selectedNao = "selected";
?>
<html>
	<head>
		<title>B3P - Banco de Perguntas Para Provas</title>
		<link rel="stylesheet" type="text/css" href="../style.css"/>
	</head>
	
<body background='../imagens/bg_back.png'>
<div id='rodape'>

	<?php include "../topo.php";?>
			
	<?php include "../menu.php";?>
	
	
	<TABLE BORDER=<?php echo $borda?> WIDTH=100% style='height: 500px' CELLSPACING=0>
		<tr>		
			<td valign='top' WIDTH='100em'>
			
				<?php include "../menu_lateral_parametros.php"; ?>
			
			</td>
			
			<td valign='top'>
			
			<!--INICIO-DO-CONTEUDO-DA-PAGINA-->
				<form action="disciplinas_listar.php" method="post">
						<fieldset class="grupo">
							<div class="campo">
							<h3>Cadastratar Disciplina</h3>
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr>
										<td style="width: 10em">
											<label for="txtListar"> Código </label>
										</td>
										<td style="width: 40em">
											<label for="txtListar" > &nbsp&nbsp Disciplina </label>
										</td>
										<td style="width: 5em">
											<label for="txtListar"> &nbsp Online? </label>
										</td>
										<td style="width: 5em">
											<label for="txtListar"></label>
										</td>
									</tr>

									<tr>
										<td align='center'>
											<input type="text" name="codigoDisciplina" style="width: 95%"/>
										</td>
										<td align='center'>
											<input type="text" name="disciplina" style="width: 95%"/>
										</td>
										<td align='center'>
											<select id="online" name="online">
												<option value='sim'>Sim</option>
												<option value='nao'>Não</option>
											</select>
										</td>										
										<form action="../perguntas_listar/alterar.php?codigoGet=<?php echo $resultFiltro['codQuestao']?>" method="post">
										<td>
											<input type="checkbox" name="checkbox" value="inserir" style="display:none" checked>
											<button type="submit" name="submit" class="button"><span>Cadastrar</span></button></form>											
										</td>
									</tr>
								</table>
							</div>
						</fieldset>					
					</form>				
				<?php include "resultado.php";?>
			<!--FIM-DO-CONTEUDO-DA-PAGINA-->

			</td>
		</tr>
	</table>
</DIV>
</body>
</html>
<?php include "../botton.php";?>