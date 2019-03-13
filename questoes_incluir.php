<?php	
	include "config.php";
	include "connect.php";
	
	// cria a instrução SQL que vai selecionar os dados
	$query = sprintf("SELECT * FROM qtipo");
	// executa a query
	$dados = mysqli_query($conecta,$query) or die(mysql_error());
	// transforma os dados em um array
	$linha = mysqli_fetch_assoc($dados);
?>

<html>
	<head>
		<title>B3P - Banco de Perguntas Para Provas</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script language="javascript" type="text/javascript">
			function validar() {
			var tipoPergunta = form1.tipoPergunta.value;
			
			if (tipoPergunta == "00") {
				alert('SELECIONE UM TIPO PARA CADASTRAR');
				form1.tipoPergunta.focus();
				return false;
			}
		}
		</script>
	</head>
	
<body background='imagens/bg_back.png'>
<div id='rodape'>

		
	<?php include "topo.php";?>
			
	<?php include "menu.php";?>
	
	<TABLE BORDER=<?=$borda?> WIDTH=100% style='height: 500px' CELLSPACING=0>
		<tr>
			
			<td valign='top' WIDTH='100em'>
			
				<?php include "menu_lateral_questoes.php"; ?>
			
			</td>
			
			<td valign='top'>
			
			<!--INICIO-DO-CONTEUDO-DA-PAGINA-->
			<fieldset class="grupo">
				<label><h3>Incluir Pergunta</h3></label>
				<div class="campo">
					<form name="form1" method="post" name="Enviar" id="loginCliente" action="direcionar_pergunta.php">				 
						<TABLE BORDER=<?=$borda?> CELLSPACING=0>
							<tr><td>
								<label for="txtDificuldade">Selecione o tipo:</label>
							</td><td>
								<select id="tipoPergunta" name="tipoPergunta">
								<option value='00'> SELECIONE O TIPO </option>
									<?php
										do {
									?>	
											<option value='<?=$linha['tipoq']?>'><?=$linha['descricao']?></option>
									<?php
											}while($linha = mysqli_fetch_assoc($dados));
									?>
								</select>
							</td></tr>
						</table>
						&nbsp <p>
					
					<button type="submit" name="submit" class="button" onclick="return validar()"><span>Enviar</span></button>
					</form>					
				</div>	
			</fieldset>
			<!--FIM-DO-CONTEUDO-DA-PAGINA-->
			
			</td>
		</tr>
	</table>
</DIV>

</body>
</html>
<?php include "botton.php";?>