<?php
	include "../config.php";
	include '../connect.php';	
	
	$codigo = $_SESSION['tipo'];

	$queryTipo = sprintf("SELECT tipominimo,tipomaximo FROM qtipo where tipoq='$codigo'");
	$dadosTipo = mysqli_query($conecta,$queryTipo) or die(mysql_error());
	$resultTipo = mysqli_fetch_assoc($dadosTipo);
	$linhasTipo = mysqli_num_rows($dadosTipo);
	
	$qtdMinina = $resultTipo['tipominimo'];
	$qtdMaxima = $resultTipo['tipomaximo'];
	
	$queryDificuldade = sprintf("SELECT * FROM qdificuldade order by codDificuldade");
	$dadosDificuldade = mysqli_query($conecta,$queryDificuldade) or die(mysql_error());
	$resultDificuldade = mysqli_fetch_assoc($dadosDificuldade);
	$linhasDificuldade = mysqli_num_rows($dadosDificuldade);
	
	$queryCampus = sprintf("SELECT * FROM qcampus");
	$dadosCampus = mysqli_query($conecta,$queryCampus) or die(mysql_error());
	$resultCampus = mysqli_fetch_assoc($dadosCampus);
	$linhasCampus = mysqli_num_rows($dadosCampus);
	
	$queryDisciplinas = sprintf("SELECT * FROM qdisciplinas");
	$dadosDisciplinas = mysqli_query($conecta,$queryDisciplinas) or die(mysql_error());
	$resultDisciplinas = mysqli_fetch_assoc($dadosDisciplinas);
	$linhasDisciplinas = mysqli_num_rows($dadosDisciplinas);
?>

<html>
	<head>
		<title>B3P - Banco de Perguntas Para Provas</title>
		<link rel="stylesheet" type="text/css" href="../style.css"/>
		
		<script language="javascript" type="text/javascript">
			function validar() {
			var disciplina = form1.disciplina.value;
			var dificuldade = form1.dificuldade.value;
			var tipoPergunta = form1.tipoPergunta.value;
			var dgtPergunta = form1.dgtPergunta.value;
			var dgtTags = form1.dgtTags.value;
			
			if (disciplina == "00") {
				alert('SELECIONE A DISCIPLINA');
				form1.disciplina.focus();
				return false;
			}
						
			if (dificuldade == "00") {
				alert('SELECIONE A DIFICULDADE');
				form1.dificuldade.focus();
				return false;
			}
			if (tipoPergunta == "00") {
				alert('SELECIONE A QUANTIDADE DE ALTERNATIVAS');
				form1.tipoPergunta.focus();
				return false;
			}
			if (dgtPergunta == "") {
				alert('PREENCHA O ENUNCIADO');
				form1.dgtPergunta.focus();
				return false;
			}
			if (dgtTags == "") {
				alert('DIGITE AS TAG\'S DE PESQUISA');
				form1.dgtTags.focus();
				return false;
			}
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
				<form name="form1" action="perguntas_verdadeirofalso_02.php" method="post">
						<fieldset class="grupo">
							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDificuldade">Selecione o tipo:&nbsp</label>
									</td><td>
										<input type="text" id="codigo" name="codigo" style="width: 11em" value="VERDADEIRO/FALSO" disabled/>
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
										<select name="disciplina" id="disciplina">
										<option value="00">--</option>
										<?php
											do {
										?>
											<option value="<?php echo $resultDisciplinas['codDisciplina'];?>"><?php echo $resultDisciplinas['disciplina'];?></option>										
										<?php
											} while($resultDisciplinas = mysqli_fetch_assoc($dadosDisciplinas));
										?>									
										</select>		
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
										<input type="text" id="codigo" name="nome" style="width: 10em" value="" disabled/>
									</td></tr>
								</table>
							</div>
						
							<div class="campo">							
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtDificuldade">Dificuldade:&nbsp</label>
									</td><td>
										<select name="dificuldade" id="dificuldade">
										<option value="00">--</option>
										<?php
											do {
										?>
											<option value="<?php echo $resultDificuldade['codDificuldade'];?>"><?php echo $resultDificuldade['nomeDificuldade'];?></option>										
										<?php
											} while($resultDificuldade = mysqli_fetch_assoc($dadosDificuldade));
										?>								
										</select>
									</td></tr>
								</table>								
							</div>
							
							
							<div class="campo">
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr><td>
										<label for="txtQtdAlternativa">Alternativas:&nbsp</label>
									</td><td>
										<select id="tipoPergunta" name="tipoPergunta">
										<option value='00'>--</option>
											<?php
												for ($qtdMinina;$qtdMinina<=$qtdMaxima;$qtdMinina++){
											?>
													<option value='<?php echo $qtdMinina;?>'><?php echo $qtdMinina;?></option>
											<?php
												}
											?>		
										
										</select>
									</td></tr>
								</table>
							</div>
							
						</fieldset>
						
						<fieldset class="grupo">
							<div class="campo">
								<label for="dgtPergunta">Digite a pergunta:&nbsp</label>
								<textarea rows="6" style="width: 40em" id="dgtPergunta" name="dgtPergunta"></textarea>
							</div>
						</fieldset>	
						
						<fieldset class="grupo">
							<div class="campo">
								<label for="dgtPergunta">Digite as tag's de pesquisa:&nbsp</label>
								<textarea rows="2" style="width: 40em" id="dgtTags" name="dgtTags"></textarea>
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