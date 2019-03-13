<?php
	include "../config.php";
	include '../connect.php';	
	
	//Tratamento POST disciplina
	$disciplinaPost = $_SESSION['disciplina'];	
	$queryDisciplina = sprintf("SELECT disciplina FROM qdisciplinas where codDisciplina=$disciplinaPost");
	$dadosDisciplinaPost = mysqli_query($conecta,$queryDisciplina) or die(mysql_error());
	$resultDisciplinaPost = mysqli_fetch_assoc($dadosDisciplinaPost);
	$linhasDisciplinaPost = mysqli_num_rows($dadosDisciplinaPost);
	
	//tratamento POST dificuldade
	$dificuldadePost = $_SESSION['dificuldade'];	
	$queryDificuldadePost = sprintf("SELECT nomeDificuldade FROM qdificuldade where codDificuldade='$dificuldadePost'");
	$dadosDificuldadePost = mysqli_query($conecta,$queryDificuldadePost) or die(mysql_error());
	$resultDificuldadePost = mysqli_fetch_assoc($dadosDificuldadePost);
	$linhasDificuldadePost = mysqli_num_rows($dadosDificuldadePost);
	
	//tratamento POST Alternativas
	$qtdAlternativasPost = $_SESSION['tipoPergunta'];
	
	//tratamento POST questão
	$qtdDgtPergunta = $_SESSION['dgtPergunta'];
	
	//tratamento POST tag's
	$qtdDgtTags = $_SESSION['dgtTags'];
	
	//tratamento POST codigo
	$codQuestao = $_SESSION['codQuestao'];

	
	//Tratamento POST inserindo alternativas
	$numPost = 1;				
	$alternativasMinimoChar = 'A';	
	$ultimaAlternativa = $_POST['ultimaAlternativa'];

	do{
		$strDgtAlternativa = "dgtAlternativa_" . "$numPost";			
		$dgtAlternativa = $_POST[$strDgtAlternativa];
			
			
		$strAlternativasCorreta = "alternativasCorreta_" . "$numPost";
		if (!isset($_POST[$strAlternativasCorreta])) $alternativasCorreta = "N";
		else $alternativasCorreta = "S";			
			
			$sqlInputAlternativas = "INSERT INTO qAlternativas (codQuestao,tipo,opcao,descricaoAlternativa,correta)
			VALUES ('$codQuestao','AT','$alternativasMinimoChar','$dgtAlternativa','$alternativasCorreta')";
			$dadosInputAlternativas = mysqli_query($conecta,$sqlInputAlternativas);
		
		$numPost++;	
		$alternativasMinimoChar++;		

	} while ($numPost < $ultimaAlternativa);
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
			
				<?php include "../menu_lateral_questoes.php"; ?>
			
			</td>	
			<td valign='top'>
			
			<!--INICIO-DO-CONTEUDO-DA-PAGINA-->			
					<form action="../questoes_incluir.php" method="post">
						<fieldset class="grupo">
							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDificuldade">Selecione o tipo:&nbsp</label>
									</td><td>
										<input type="text" id="codigo" name="codigo" style="width: 10em" value="LACUNAS" disabled/>
									</td></tr>
								</table>
							</div>
						</fieldset>
						
						<fieldset class="grupo">
							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDisciplina">Disciplina:&nbsp</label>
									</td><td>
										<input type="text" id="disciplina" name="disciplina" style="width: 35em" value="<?php echo $resultDisciplinaPost['disciplina']?>" disabled/>		
									</td></tr>
								</table>									
							</div>
						</fieldset>

						<fieldset class="grupo">
						
							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="codigo">Código:&nbsp</label>
									</td><td>									
										<input type="text" id="codigo" name="nome" style="width: 10em" value="<?php echo $codQuestao?>" disabled/>
									</td></tr>
								</table>
							</div>

							<div class="campo">							
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDificuldade">Dificuldade:&nbsp</label>
									</td><td>
										<input type="text" id="txtDificuldade" name="txtDificuldade" style="width: 4em" value="<?php echo $resultDificuldadePost['nomeDificuldade']?>" disabled/>
									</td></tr>
								</table>								
							</div>

							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtQtdAlternativa">Alternativas:&nbsp</label>
									</td><td>
										<input type="text" id="txtQtdAlternativa" name="txtQtdAlternativa" style="width: 1.8em" value="<?php echo $qtdAlternativasPost?>" disabled/>
									</td></tr>
								</table>
							</div>
							
				
						</fieldset>
						
						<fieldset class="grupo">
							<div class="campo">
								<label for="dgtPergunta">Digite a pergunta:&nbsp</label>
								<textarea rows="6" style="width: 40em" id="dgtPergunta" name="dgtPergunta" disabled><?php echo $qtdDgtPergunta?></textarea>
							</div>
						</fieldset>			
						
						<fieldset class="grupo">
							<div class="campo">
								<label for="dgtPergunta">Digite as tag's de pesquisa (separadas por virgula):&nbsp</label>
								<textarea rows="2" style="width: 40em" id="dgtTags" name="dgtTags" disabled><?php echo $qtdDgtTags?></textarea>
							</div>
						</fieldset>	
						
						
						<fieldset class="grupo">
							<div class="campo">
								<label for="dgtPergunta">Digite as alternativas e selecione a(s) que for(em) correta(s):&nbsp</label>
								<?php
									$sqlOutputAlternativas = "SELECT descricaoAlternativa FROM qAlternativas where codQuestao='$codQuestao' ORDER BY opcao ASC";	
									$dadosOutputAlternativas = mysqli_query($conecta,$sqlOutputAlternativas) or die(mysql_error());
																		
									$alternativasMinimoChar = 'A';
									for ($alternativasMinimo = 1 ; $alternativasMinimo<=$qtdAlternativasPost ; $alternativasMinimo++){
									$resultOutputAlternativas = mysqli_fetch_assoc($dadosOutputAlternativas);
								?>
								
								<TABLE BORDER=0 CELLSPACING=0>
									<tr><td>
										<label for="txtQtdAlternativa_<?php echo $alternativasMinimo?>">Lacuna <?php echo $alternativasMinimoChar?>:&nbsp</label>
									</td><td>
										<textarea rows="1" style="width: 35em" id="dgtAlternativa_<?php echo $alternativasMinimo?>" name="dgtAlternativa_<?php echo $alternativasMinimo?>" disabled><?php echo $resultOutputAlternativas['descricaoAlternativa']?></textarea>
									</td></tr>
								</table>
								
								<?php
									$alternativasMinimoChar++;
									}
								?>
							<label><h3><font color=red>Pergunta cadastrada com sucesso!</font></h3></label>
							<label><h3><font color=grey>Código: <b><?php echo $codQuestao?></b></font></h3></label>
							<input type="checkbox" name="ultimaAlternativa" value="<?php echo $alternativasMinimo?>" style="display:none" checked>
							<button type="submit" name="submit" class="button"><span>Voltar</span></button>
								
							</div>
						</fieldset>

				</form>	
				
			<!--FIM-DO-CONTEUDO-DA-PAGINA-->

			</td>
		</tr>
	</table>
</DIV>
</body>
</html>
<?php include "../botton.php";?>