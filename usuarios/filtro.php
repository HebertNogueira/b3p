<?php
	include "../config.php";
	include "../connect.php";
?>
<html>
	<head>
		<title>B3P - Lista Usuários</title>
		<link rel="stylesheet" type="text/css" href="../style.css"/>
	</head>
	
<body background='../imagens/bg_back.png'>
<div id='rodape'>

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
							<!--INICO-DO-CONTEUDO-DA-PAGINA-->
							<form name="form0" action="pesquisar.php" method="post" >	
								<fieldset class="grupo">
									<div class="campo">
										<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
											<tr> 
												<td>
													<button type="submit" class="button" name="submit" value="Pesquisar"><span>Pesquisar</span></button>
												</td>
												<td>
													<label for="txtrgm" >RGM:&nbsp</label>
												</td>
												<td>
													<input style="width: 8em" type="text" id="pRgm" name="pRgm" style="width: 4em" />
												</td>
												<td>
													<label for="txtrgm" >&nbspNome:&nbsp</label>
												</td>
												<td>
													<input style="width: 18em" type="text" id="pRgm" name="pNome" style="width: 4em" />
												</td>
											</tr>
										</table>
									</div>
								</fieldset>
							</form>							
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