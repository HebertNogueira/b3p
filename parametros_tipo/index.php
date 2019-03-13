<?php
	//Configurações
	include "../config.php";
	
	//Conecta no BD
	include "../connect.php";
	
	include "alterando_valores.php";
	
	// cria a instrução SQL que vai selecionar os dados
	$sqlQtipoIndex = sprintf("SELECT * FROM qtipo");
	// executa a query e guarda o resultado na variável $queryQtipo
	$queryQtipoIndex = mysqli_query($conecta,$sqlQtipoIndex) or die(mysql_error());
	// transforma os dados da variável $queryQtipo em um array na variável $resultadoQtipo
	$resultadoQtipoIndex = mysqli_fetch_assoc($queryQtipoIndex);

	//Desconecta do BD 

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
	<TABLE BORDER=<?=$borda?> WIDTH=100% style='height: 500px' CELLSPACING=0>
		<tr>
			<td valign='top' WIDTH='100em'>
			
				<?php include "../menu_lateral_parametros.php"; ?>
			
			</td>
			<td valign='top'>			
			<!--INICIO-DO-CONTEUDO-DA-PAGINA-->
			
			<fieldset class="grupo">
				<label><h3>Informe a quantidade mínima e máxima de alternativas para novas questões.</h3></label>
				<div class="campo">
					<form method="post" name="Enviar" id="loginCliente" action="index.php">				 
						<TABLE BORDER=<?=$borda?> CELLSPACING=0>
							<tr>							
								<td valign='botton'>
									<label for="txtDificuldade">&nbsp</label>
								</td>								
								<td align='center'>							
									<label for="txtDificuldade"><h4>Mínimo</h4></label>
								</td>								
								<td valign='botton'>
									<label for="txtDificuldade">&nbsp&nbsp</label>
								</td>								
								<td align='center'>							
									<label for="txtDificuldade"><h4>Máximo</h4></label>
								</td>							
							</tr>
							
						<?php 
						do{						
						?>
							<tr>
								<td align='right'>
									<label for="txtDificuldade"><b><?php echo $resultadoQtipoIndex['descricao']?></b>:&nbsp&nbsp&nbsp&nbsp</label>
								</td>
								<td align='center'>							
									<input type="text" name="minimo_<?php echo $resultadoQtipoIndex['tipoq']?>" style="width: 5em" value="<?php echo $resultadoQtipoIndex['tipominimo']?>">
								</td>
								<td valign='botton'>
									<label for="txtDificuldade">&nbsp&nbsp</label>
								</td>
								<td align='center'>							
									<input type="text" name="maximo_<?php echo $resultadoQtipoIndex['tipoq']?>" style="width: 5em" value="<?php echo $resultadoQtipoIndex['tipomaximo']?>">
								</td>
							</tr>
							<tr>							
								<td>&nbsp </td>	
							</tr>
						<?php
						} while ($resultadoQtipoIndex = mysqli_fetch_assoc($queryQtipoIndex));
						?> 
							<tr>
								<td>
									<input type="checkbox" name="checkEnvio" value="1" style="display:none" checked>
									<button type="submit" name="submit" class="button"><span>Salvar</span></button>
								</td>
							</tr>
						</table>
					</form>					
				</div>
			</fieldset>
				<?php if(isset($_POST['checkEnvio'])){ ?>
					<h4><font color=red>&nbsp&nbsp&nbsp&nbspNovos valores salvos com sucesso.</font></h4>
				<?php } ?>
			<!--FIM-DO-CONTEUDO-DA-PAGINA-->
			</td>
		</tr>
	</table>
</DIV>

</body>
</html>
<?php include "../botton.php";?>