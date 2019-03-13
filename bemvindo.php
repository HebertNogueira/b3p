<?php	
	include "config.php";
	include "connect.php";	

	$rgm = $_SESSION['rgm'];
	$sqlUsuarioLogado = sprintf("SELECT nome FROM usuarios where rgm='$rgm'");
	$queryUsuarioLogado = mysqli_query($conecta,$sqlUsuarioLogado) or die(mysql_error());
	$resultUsuarioLogado = mysqli_fetch_assoc($queryUsuarioLogado);	
	
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
			<td valign='top'>
			
			<!--INICIO-DO-CONTEUDO-DA-PAGINA-->
			<fieldset class="grupo">			
				<div class="campo">		 
					<TABLE BORDER=<?=$borda?> CELLSPACING=0>
						<tr><td>
							<label for="txtDificuldade"><h3>Bem-vindo(A), <?=$resultUsuarioLogado['nome']?>.<br>Selecione uma das opções no menu superior.</h3></label>
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