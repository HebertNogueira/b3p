<?php
	include "../config.php";
	include "../connect.php";

	$nPesquisa = $_SESSION['check'];	
	
	$frgm ="";
	$fNome ="";
	$fValida ='false';
	$contLinhas = 0;
	
	if((!isset($_POST['pRgm'])) || (!isset($_POST['pNome']))) {
		$fValida ='false';
	}else{
		$frgm = $_POST['pRgm'];
		$fNome = $_POST['pNome'];
		$fValida ='true';
	} 
	
	if ($fValida=='true') {   
		$queryUsuario = ("SELECT a.codigo,a.rgm,a.nome,a.email,a.senha,a.coordena,b.nome'nome2',a.ativo FROM usuarios b INNER JOIN usuarios a ON a.cadastrou = b.CODIGO WHERE a.rgm like '%$frgm%' and a.nome like '%$fNome%'");
		$rsCarregaDados = mysqli_query($conecta,$queryUsuario) or die(mysqli_error());
		$contLinhas = mysqli_num_rows($rsCarregaDados);
		
		$row = mysqli_fetch_assoc($rsCarregaDados);
		$row['codigo'];  
		$row['rgm'];
		$row['nome'];
		$row['email'];
		$row['coordena'];
		$row['ativo'];
		$row['nome2'];
	}	
	
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
													<button type="submit" class="button" name="submit"><span>Pesquisar</span></button>
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
							<form name="form1" action="definirAcao.php" method="post" >
									<?php
									if(($contLinhas > 0 )){
									
									?>
									<fieldset class="grupo">
										<div class="campo">
											<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
												<tr>
												  <td>
														<label for="txtListar"></label>
													</td>
													<td>
														<label for="txtListar"></label>
													</td>
													<td style="width: 4em" >
														<label for="txtListar" >Código</label>
													</td>
													<td style="width: 6em">
														<label for="txtListar">&nbspRGM</label>
													</td>
													<td style="width: 23em">
														<label for="txtListar">&nbspNome</label>
													</td>
													<td style="width: 19em">
														<label for="txtListar">&nbspE-mail </label>
													</td>
													<td style="width: 6em" align='center'>
														<label for="txtListar">Coordena</label>
													</td>
													<td style="width: 4em" align='center' >
														<label for="txtListar">Ativo</label>
													</td>
													<td style="width: 23em" align='left' >
														<label for="txtListar">&nbspQuem Cdastrou</label>
													</td>
												</tr>	
												<?php
													do {
												?>
												<tr>
													<td style="width: 6em" align='right'>
														<button type="submit" class="button" name="btnAlterar" formmethod="post" formaction="definirAcao.php" value="AT<?php echo $row['codigo'];?>"><span>Alterar</span></button>
													</td>
													<td>
														<button type="submit" class="button" name="btnExcluir"  formmethod="post" formaction="definirAcao.php" value="EX<?php echo $row['codigo'];?>"><span>Excluir</span></button>
													</td>
													<td align='center'>
														<input type="text" name="codigo" style="width: 3em" value="<?php echo $row['codigo'];?>" disabled/>
													</td>
																
													<td align='center'>
														<input type="text" name="codigo" style="width: 5em" value="<?php echo $row['rgm'];?>" disabled/>
													</td>
													
													<td align='center' >
														<input type="text" style="width: 22em" value="<?php echo $row['nome'];?>" disabled/>
														<tb></td>																	
													</td>
													
													<td align='center'>
														<input type="text" style="width: 18em" value="<?php echo $row['email'];?>" disabled/>
													</td>
													<td align='center'>
															<?php if ($row['coordena'] == 'S') $checked = "checked";
														else $checked = ""; ?>
														<input type="checkbox" id="coordena" name="coordena" <?php echo $checked; ?> disabled/ >
													</td>
													
													<td  align='center'> 
														<?php if ($row['ativo'] == 'S') $checked = "checked";
														else $checked = ""; ?>
														<input type="checkbox" id="ativo" name="ativo" <?php echo $checked; ?> disabled/ >
													</td>
													
													<td  align='center'> 	
														<input type="text" name="cadastrou" style="width: 22em" value="<?php echo $row['nome2'];?>" disabled/ />
													</td>	
												</tr>
												<?php
														} while($row = mysqli_fetch_assoc($rsCarregaDados));
												?>
											</table>
										</div>
									</fieldset>	
											<?php
												} else {
													echo '<fieldset class="grupo"><div class="campo"><label for="txtListar">Nenhum registro Encontrado, Redefina critérios de busca.</label></div></fieldset>';
												}
											?>
											
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