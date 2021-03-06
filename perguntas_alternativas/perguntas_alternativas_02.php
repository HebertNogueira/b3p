<?php
	include "../config.php";
	include '../connect.php';	
	
	$codigo = $_SESSION['tipo'];
	$codigo_user = $_SESSION['codigo_user'];

	$queryTipo = sprintf("SELECT tipominimo,tipomaximo,descricao FROM qtipo where tipoq='$codigo'");
	$dadosTipo = mysqli_query($conecta,$queryTipo) or die (mysqli_error($conecta));
	$resultTipo = mysqli_fetch_assoc($dadosTipo);
	
	//Tratamento POST disciplina
	$disciplinaPost = $_POST['disciplina'];	
	$_SESSION['disciplina'] = $disciplinaPost;
	
	$queryDisciplina = sprintf("SELECT disciplina FROM qdisciplinas where codDisciplina=$disciplinaPost");
	$dadosDisciplinaPost = mysqli_query($conecta,$queryDisciplina) or die (mysqli_error($conecta));
	$resultDisciplinaPost = mysqli_fetch_assoc($dadosDisciplinaPost);
	
	//tratamento POST dificuldade
	$dificuldadePost = $_POST['dificuldade'];	
	$_SESSION['dificuldade'] = $dificuldadePost;
	
	$queryDificuldadePost = sprintf("SELECT nomeDificuldade FROM qdificuldade where codDificuldade='$dificuldadePost'");
	$dadosDificuldadePost = mysqli_query($conecta,$queryDificuldadePost) or die (mysqli_error($conecta));
	$resultDificuldadePost = mysqli_fetch_assoc($dadosDificuldadePost);
	
	//tratamento POST Alternativas
	$qtdAlternativasPost = $_POST['tipoPergunta'];
	$_SESSION['tipoPergunta'] = $qtdAlternativasPost;
	
	//tratamento POST questão
	$qtdDgtPergunta = $_POST['dgtPergunta'];
	$_SESSION['dgtPergunta'] = $qtdDgtPergunta;
	
	//tratamento POST tag's
	$qtdDgtTags = $_POST['dgtTags'];
	$_SESSION['dgtTags'] = $qtdDgtTags;
	
	//Tratamento POST questão, gerando codigo
	$queryInputQuestoes = "INSERT INTO questoes (cadastrou,enunciado,tags,qtdAlternativa,dificuldade,disciplina,tipoq,ativo) 
	VALUES ('$codigo_user','$qtdDgtPergunta',',$qtdDgtTags,','$qtdAlternativasPost','$dificuldadePost','$disciplinaPost','AT','S')";
	$dadosInputQuestoes = mysqli_query($conecta,$queryInputQuestoes) or die (mysqli_error($conecta));

	//pegando o ultimo codigo adicionado
	$queryOutputQuestoes = "SELECT codQuestao FROM questoes ORDER BY codQuestao DESC LIMIT 1";	
	$dadosOutputQuestoes = mysqli_query($conecta,$queryOutputQuestoes) or die (mysqli_error($conecta));
	$resultOutputQuestoes = mysqli_fetch_assoc($dadosOutputQuestoes);
	$_SESSION['codQuestao'] = $resultOutputQuestoes['codQuestao'];
	
?>

<html>
	<head>
		<title>B3P - Banco de Perguntas Para Provas</title>
		<link rel="stylesheet" type="text/css" href="../style.css"/>
		<script language="javascript" type="text/javascript">
			<?php  $alternativasMinimoChar = 'A'; ?>
			function validar() {
			var selecionada = false;
		<?php for ($alternativasMinimo = 1;$alternativasMinimo<=$qtdAlternativasPost;$alternativasMinimo++){
								
		?>
			var dgtAlternativa_<?php echo $alternativasMinimo?> = form1.dgtAlternativa_<?php echo $alternativasMinimo?>.value;
			if (dgtAlternativa_<?php echo $alternativasMinimo?> == "") {
				alert('Digite a alternativa <?php echo $alternativasMinimoChar?>');
				form1.disciplina.focus();
				return false;
			}			

		<?php
			$alternativasMinimoChar++;
				}
		?>		

		}
		</script>
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
				<form name="form1" action="perguntas_alternativas_03.php" method="post">
						<fieldset class="grupo">
							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDificuldade">Selecione o tipo:&nbsp </label>
									</td><td>
										<input type="text" id="codigo" name="codigo" style="width: 10em" value="<?php echo $resultTipo['descricao'];?>"" disabled/>
									</td></tr>
								</table>
							</div>
						</fieldset>
						
						<fieldset class="grupo">						
							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="disciplina">Disciplina:&nbsp </label>
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
										<input type="text" id="codigo" name="nome" style="width: 10em" value="<?php echo $resultOutputQuestoes['codQuestao']?>" disabled/>
									</td></tr>
								</table>
							</div>

							<div class="campo">							
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDificuldade">Dificuldade:&nbsp</label>
									</td><td>
										<input type="text" id="dificuldade" name="dificuldade" style="width: 4em" value="<?php echo $resultDificuldadePost['nomeDificuldade']?>" disabled/>
									</td></tr>
								</table>								
							</div>

							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtQtdAlternativa">Alternativas:&nbsp</label>
									</td><td>
										<input type="text" id="tipoPergunta" name="tipoPergunta" style="width: 1.8em" value="<?php echo $qtdAlternativasPost?>" disabled/>
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
									$alternativasMinimoChar = 'A';
									for ($alternativasMinimo = 1;$alternativasMinimo<=$qtdAlternativasPost;$alternativasMinimo++){
								?>
								<TABLE BORDER=0 CELLSPACING=0>
									<tr><td>
										<label for="txtQtdAlternativa_<?php echo $alternativasMinimo?>">Alternativa <?php echo $alternativasMinimoChar?>:&nbsp</label>
									</td><td>
										<textarea rows="3" style="width: 33em" id="dgtAlternativa_<?php echo $alternativasMinimo?>" name="dgtAlternativa_<?php echo $alternativasMinimo?>"></textarea>
									</td><td>
										<input type="checkbox" id="alternativasCorreta_<?php echo $alternativasMinimo?>" name="alternativasCorreta_<?php echo $alternativasMinimo?>" value="S">
									</td></tr>
								</table>
								<?php
									$alternativasMinimoChar++;
									}
								?>
								
								<input type="checkbox" name="ultimaAlternativa" value="<?php echo $alternativasMinimo?>" style="display:none" checked>

								&nbsp <br>
								<button type="submit" name="submit" class="button" onclick="return validar()"><span>Enviar</span></button>
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