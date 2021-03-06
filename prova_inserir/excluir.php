<?php
	include "../config.php";
	include '../connect.php';	
	
	$codigoGet = $_GET['codigoGet'];
	
	if($_POST['confirmaExclusao'] != true){

		$queryExcluir = sprintf("SELECT * FROM questoes a, qdisciplinas b, qtipo c, qdificuldade d where codQuestao='$codigoGet' and a.disciplina=b.codDisciplina and a.tipoq=c.tipoq and a.dificuldade=d.codDificuldade");
		$dadosExcluir = mysqli_query($conecta,$queryExcluir) or die(mysqli_error($conecta));
		$resultExcluir = mysqli_fetch_assoc($dadosExcluir);	

		$qtdAlternativa = $resultExcluir['qtdAlternativa'];
	}
	
	if($_POST['confirmaExclusao'] == true){
		
		$queryExcluir = sprintf("DELETE FROM qAlternativas WHERE codQuestao='$codigoGet'");
		$dadosExcluir = mysqli_query($conecta,$queryExcluir) or die(mysqli_error($conecta));
		
		$queryExcluir = sprintf("DELETE FROM questoes WHERE codQuestao='$codigoGet'");
		$dadosExcluir = mysqli_query($conecta,$queryExcluir) or die(mysqli_error($conecta));

	}
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

						<fieldset class="grupo">
							<div class="campo">
							<?php if($_POST['confirmaExclusao'] == true) echo "<h1>PERGUNTA EXCLUIDA<p>" ?>
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDificuldade">Selecione o tipo:&nbsp</label>
									</td><td>
										<input type="text" id="codigo" name="codigo" style="width: 10em" value="<?php echo $resultExcluir['descricao'];?>" disabled/>
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
										<input type="text" id="disciplina" name="disciplina" style="width: 35em" value="<?php echo $resultExcluir['disciplina']?>" disabled/>		
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
										<input type="text" id="codigo" name="nome" style="width: 10em" value="<?php echo $resultExcluir['codQuestao']?>" disabled/>
									</td></tr>
								</table>
							</div>

							<div class="campo">							
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDificuldade">Dificuldade:&nbsp</label>
									</td><td>
										<input type="text" id="txtDificuldade" name="txtDificuldade" style="width: 4em" value="<?php echo $resultExcluir['nomeDificuldade']?>" disabled/>
									</td></tr>
								</table>								
							</div>

							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtQtdAlternativa">Alternativas:&nbsp</label>
									</td><td>
										<input type="text" id="txtQtdAlternativa" name="txtQtdAlternativa" style="width: 1.8em" value="<?php echo $qtdAlternativa?>" disabled/>
									</td></tr>
								</table>
							</div>
							
				
						</fieldset>
						
						<fieldset class="grupo">
							<div class="campo">
								<label for="dgtPergunta">Pergunta:&nbsp</label>
								<textarea rows="6" style="width: 40em" id="dgtPergunta" name="dgtPergunta" disabled><?php echo $resultExcluir['enunciado']?></textarea>
							</div>
						</fieldset>			
						
						<fieldset class="grupo">
							<div class="campo">
								<label for="dgtPergunta">Tag's de pesquisa (separadas por virgula):&nbsp</label>
								<textarea rows="2" style="width: 40em" id="dgtTags" name="dgtTags" disabled><?php echo $resultExcluir['tags']?></textarea>
							</div>
						</fieldset>	
						
						
						<fieldset class="grupo">
							<div class="campo">
								<label for="dgtPergunta">Alternativas:&nbsp</label>
								<?php
																	
									$sqlOutputAlternativas = "SELECT descricaoAlternativa,correta FROM qAlternativas where codQuestao='$codigoGet' ORDER BY opcao ASC";	
									$dadosOutputAlternativas = mysqli_query($conecta,$sqlOutputAlternativas) or die(mysql_error());
																		
									$alternativasMinimoChar = 'A';
									for ($alternativasMinimo = 1;$alternativasMinimo<=$qtdAlternativa;$alternativasMinimo++){
										$resultOutputAlternativas = mysqli_fetch_assoc($dadosOutputAlternativas);
										if ($resultOutputAlternativas['correta'] == "S") $checked = "checked";
										else $checked = "";	
								?>
								
								<TABLE BORDER=0 CELLSPACING=0>
									<tr><td>
										<label for="txtQtdAlternativa_<?php echo $alternativasMinimo?>">Alternativa <?php echo $alternativasMinimoChar?>:&nbsp</label>
									</td><td>
										<textarea rows="3" style="width: 33em" id="dgtAlternativa_<?php echo $alternativasMinimo?>" name="dgtAlternativa_<?php echo $alternativasMinimo?>" disabled><?php echo $resultOutputAlternativas['descricaoAlternativa']?></textarea>
									</td><td>
										<input type="checkbox" name="alternativasCorreta" value="<?php echo $alternativasMinimo?>" <?php echo $checked?> disabled>
									</td></tr>
								</table>
								
								<?php
									$alternativasMinimoChar++;
									}									
								?>								
								

								&nbsp <br>
								<form action="../perguntas_listar/desativar.php?codigoGet=<?php echo $codigoGet ?>" method="post">
									<input type="checkbox" name="confirmaDesativar" value=true style="display:none" checked>
								<button type="submit" name="submit" class="button"><span>Desativar</span></button></form>	
							</div>
						</fieldset>
				
			<!--FIM-DO-CONTEUDO-DA-PAGINA-->

			</td>
		</tr>
	</table>
</DIV>
</body>
</html>
<?php include "../botton.php";?>