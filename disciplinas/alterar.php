<?php
	include "../config.php";
	include '../connect.php';		
	
	$codigoGet = $_GET['codigoGet'];
	
	//pegando dados DISCIPLINA no BD
	$queryDisciplinas = sprintf("SELECT * FROM qdisciplinas where codDisciplina='$codigoGet'");
	$dadosDisciplinas = mysqli_query($conecta,$queryDisciplinas) or die(mysql_error($conecta));
	$resultDisciplinas = mysqli_fetch_assoc($dadosDisciplinas);
	
	if($resultDisciplinas['dOnline']=="S") $selectedSim = "selected";
	if($resultDisciplinas['dOnline']=="N") $selectedNao = "selected";
	
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
										<form action="../disciplinas/disciplinas_listar.php?codigoGet=<?php echo $resultDisciplinas['codDisciplina']?>" method="post">
										<td align='center'>
											<input type="text" name="codigo" style="width: 95%" value="<?php echo $resultDisciplinas['codDisciplina'] ?>" disabled/>
										</td>
										<td align='center'>
											<input type="text" name="disciplina" style="width: 95%" value="<?php echo $resultDisciplinas['disciplina'] ?>" />
										</td>
										<td align='center'>
												<select name="online">
												<option value='sim' <?php echo $selectedSim ?>>Sim</option>
												<option value='nao' <?php echo $selectedNao ?>>Não</option>
											</select>
										</td>										
										<td>
											<input type="checkbox" name="checkbox" value="alterar" style="display:none" checked>
											<button type="submit" name="submit" class="button"><span>Alterar</span></button></form>											
										</td>
									</tr>
								</table>
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