<?php
	$borda = "0";
	session_start();	
	include "connect.php";
	
	if(!isset($_SESSION['logado'])) $_SESSION['logado']="NEUTRAL";
	
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
	
	<TABLE BORDER=<?=$borda?> WIDTH='100%' style='height: 500px' CELLSPACING='0'>
		<tr>
			<td valign='top'>
			
			<!--INICIO-DO-CONTEUDO-DA-PAGINA-->
			<fieldset class="grupo">			
				<div class="campo">
					<form method="post" name="Enviar" id="loginCliente" action="validar_login.php">				 
						<TABLE BORDER=<?=$borda?> WIDTH='100%' CELLSPACING='0'>
							<tr><td>
								<label for="login">Login:</label>
							</td><td>
								<input type="text" id="login" name="login" style="width: 10em"/>
							</td></tr>
							
							<tr><td><!--Espaço entre os campos--></td></tr>	
							
							<tr><td>
								<label for="senha">Senha:</label>
							</td><td>
								<input type="password" id="senha" name="senha" style="width: 10em"/>
							</td></tr>
						</table>
					&nbsp<br>
					<button type="submit" name="submit" class="button"><span>Entrar</span></button>
					
					<?php if ($_SESSION['logado'] == "NAO"): ?>
						<center><label><br><b>Falha no login.</b></label></center>
					<?php else: ?>
						<label><br> </label>
					<?php endif ?>
					

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
<?php include "connect.php";?>