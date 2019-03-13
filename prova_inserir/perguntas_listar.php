<?php
	include "../config.php";
	include '../connect.php';
	
	//tratamento SESSION tipo
	$codigo = $_SESSION['tipo'];

	$queryTipo = sprintf("SELECT * FROM qtipo where tipoq='$codigo'");
	$dadosTipo = mysqli_query($conecta,$queryTipo) or die(mysql_error());
	$resultTipo = mysqli_fetch_assoc($dadosTipo);
	
	$queryQTipo = sprintf("SELECT * FROM qtipo");
	$dadosQTipo = mysqli_query($conecta,$queryQTipo) or die(mysql_error());
	$resultQTipo = mysqli_fetch_assoc($dadosQTipo);
	
	$qtdMinina = $resultTipo['tipominimo'];
	$qtdMaxima = $resultTipo['tipomaximo'];
	
	//pegando dados DIFICULDADE no BD
	$queryDificuldade = sprintf("SELECT * FROM qdificuldade order by codDificuldade");
	$dadosDificuldade = mysqli_query($conecta,$queryDificuldade) or die(mysql_error());
	$resultDificuldade = mysqli_fetch_assoc($dadosDificuldade);

	//pegando dados DISCIPLINA no BD
	$queryDisciplinas = sprintf("SELECT * FROM qdisciplinas");
	$dadosDisciplinas = mysqli_query($conecta,$queryDisciplinas) or die(mysql_error());
	$resultDisciplinas = mysqli_fetch_assoc($dadosDisciplinas);
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
				<form action="perguntas_listar.php" method="post">
					<fieldset class="grupo">
						<label><h3>Preencha o filtro</h3></label>
							<div class="campo">
									<TABLE BORDER=<?=$borda?> CELLSPACING=0>
										<tr><td>
											<label for="txtDificuldade">Selecione o tipo:</label>
										</td><td>
											<select id="tipoPergunta" name="tipoPergunta">
											<option value='00'> -- </option>
												<?php
													do {
												?>	
														<option value='<?=$resultQTipo['tipoq']?>'><?=$resultQTipo['descricao']?></option>
												<?php
														}while($resultQTipo = mysqli_fetch_assoc($dadosQTipo));
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
										<label for="txtDisciplina">Disciplina:&nbsp </label>
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
										<input type="text" id="Codigo" name="Codigo" style="width: 10em" value="">
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
										<select id="Alternativas" name="Alternativas">
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
								&nbsp <br>
								<button type="submit" name="submit" class="button"><span>Pesquisar</span></button>
							</div>
						</fieldset>	
				</form>	
				
				<?php include "filtro.php";?>
				
				<?php include "resultado.php";?>
				
			<!--FIM-DO-CONTEUDO-DA-PAGINA-->

			</td>
		</tr>
	</table>
</DIV>
</body>
</html>
<?php include "../botton.php";?>