<?php
	include "../config.php";
	include "../connect.php";
?>

<html>
	<head>
		<title>B3P - Usuarios</title>
		<link rel="stylesheet" type="text/css" href="../style.css"/>
	</head>
	
<body background='../imagens/bg_back.png'>
<div id='rodape'>
	
	<!--  Carregando topo da pagina e Menu -->
	<?php include "../topo.php";?>	
	<?php include "../menu.php";?>
	
	
	<TABLE BORDER=<?php echo $borda?> WIDTH=100% style='height: 500px' CELLSPACING=0>
		<tr>
			<td valign='top'  WIDTH='50em'>
			
				<?php include "../menu_lateral_parametros.php"; ?>
								
			</td>
			<td valign='top'>
				<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
					<tr>
						<td>
							<!--INICIO-DO-MENU-INCLUIR-->
							<?php include "../menu_lateral_usuarios.php"; ?>
							<!--FIM-DO-MENU-INCLUIR-->
						</td>
					</tr>
					<tr>
						<td valign='top'>				
							<!--INICIO-DO-CONTEUDO-DA-PAGINA-->
							<fieldset class="grupo">			
								<div class="campo">		 
									<label for="txtDificuldade"><h3>Selecione Incluir ou Listar.</h3></label>
								</div>	
							</fieldset>
							<!--FIM-DO-CONTEUDO-DA-PAGINA-->				
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</DIV>
</body>
</html>
<?php include "../botton.php";?>