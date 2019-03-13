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
				<div class="campo">		 
					<TABLE BORDER=<?=$borda?> CELLSPACING=0>
						<tr><td>
							<label for="txtDificuldade"><h3>Selecione uma das opções no menu ao lado,<br>para incluir ou listar perguntas.</h3></label>
						</td></tr>
					</table>
					&nbsp <p>
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