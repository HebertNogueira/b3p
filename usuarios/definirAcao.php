<?php
	include "../config.php";
	include "../connect.php";
	
	$alteracao = "false";
	$excluir = "false";
	
	if(!isset($_POST['btnAlterar'])) {
		//echo "Alterar Vazio<br>"; 
	}else{
		$alterar = $_POST['btnAlterar'];
		$tAt = substr($alterar, 0,2);
		$cAt = substr($alterar, 2);
		$alteracao = 'true';
		
	} 
	
	if(!isset($_POST['btnExcluir'])) {
		//echo "Excluir Vazio<br>"; 
	}else{		
		$excluir = $_POST['btnExcluir'];
		$tEx = substr($excluir, 0,2);
		$cEx = substr($excluir, 2);		
		$excluir = 'true';
	} 
	
	if($excluir == 'true'){
		$queryUsuario = sprintf("SELECT a.codigo,a.rgm,a.nome,a.email,a.senha,a.coordena,b.nome'nome2',a.ativo FROM usuarios b INNER JOIN usuarios a ON a.cadastrou = b.CODIGO where a.codigo = $cEx");
		$rsCarregaDados = mysqli_query($conecta,$queryUsuario) or die(mysql_error());
		$linhasOutputUsuarios = mysqli_num_rows($rsCarregaDados);
	}
	
	if($alteracao == 'true'){
		$queryUsuario = sprintf("SELECT a.codigo,a.rgm,a.nome,a.email,a.senha,a.coordena,b.nome'nome2',a.ativo FROM usuarios b INNER JOIN usuarios a ON a.cadastrou = b.CODIGO where a.codigo = $cAt");
		$rsCarregaDados = mysqli_query($conecta,$queryUsuario) or die(mysql_error());
		$linhasOutputUsuarios = mysqli_num_rows($rsCarregaDados);
	}
			$row = mysqli_fetch_assoc($rsCarregaDados);
			$row['codigo'];  
			$row['rgm'];
			$row['nome'];
			$row['email'];
			$row['coordena'];
			$row['ativo'];
			$row['nome2'];
?>



<html>
	<head>
		<title>B3P - Lista Alteraçao Exclusão</title>
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
						<!-- Carregando Filtro Inicial Desabilitado Apenas para manter o padrao do Formulario -->		
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
												<input style="width: 8em" type="text" id="pRgm" name="pRgm" style="width: 4em" disabled/>
											</td>
											<td>
												<label for="txtrgm" >&nbspNome:&nbsp</label>
											</td>
											<td>
												<input style="width: 18em" type="text" id="pRgm" name="pNome" style="width: 4em" disabled/>
											</td>
										</tr>
									</table>
								</div>
							</fieldset>
						</form>	
						

						<!--Form para mostrar o resultado do filtro que será excluido o alterado -->	
							<form name="form1" action="definirAcao.php" method="post" >						
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
												<tr>
													<td style="width: 6em" align='right'>
														<button type="submit"  class="button" name="btnAlterar" formmethod="post" formaction="definirAcao.php" value="AT<?php echo $row['codigo'];?>"><span>Alterar</span></button>
													</td>
													<td>
														<button type="submit" class="button" name="btnExcluir"  formmethod="post" formaction="definirAcao.php" value="EX<?php echo $row['codigo'];?>"><span>Excluir</span></button>
													</td>									
													<td align='center'>
														<input type="hidden" name="codigo" value="<?php echo $row['codigo'];?>">
														<input type="text" name="codigo" style="width: 3em" value="<?php echo $row['codigo'];?>" disabled/>
													</td>
																
													<td align='center'>
														<input type="hidden" name="rgm" value="<?php echo $row['rgm'];?>">
														<input type="text" name="rgm" style="width: 5em" value="<?php echo $row['rgm'];?>" disabled/>
													</td>
													
													<td align='center' >
														<input type="text" name="nome"  style="width: 22em" value="<?php echo $row['nome'];?>" />
														<tb></td>																	
													</td>
													
													<td align='center'>
														<input type="text" name="mail" style="width: 18em" value="<?php echo $row['email'];?>" />
													</td>
													<td align='center'>
															<?php if ($row['coordena'] == 'S') $checked = "checked";
														else $checked = ""; ?>
														<input type="checkbox" id="coordena" name="coordena" <?php echo $checked; ?>>
													</td>
													
													<td  align='center'> 
														<?php if ($row['ativo'] == 'S') $checked = "checked";
														else $checked = ""; ?>
														<input type="checkbox" id="ativo" name="ativo" <?php echo $checked; ?>>
													</td>
													
													<td  align='center'> 	
														<input type="text" name="cadastrou" style="width: 22em" value="<?php echo $row['nome2'];?>" disabled/ />
													</td>	
														
												</tr>

											</table>	
										</div>
									</fieldset>		
									<fieldset class="grupo">
										<div class="campo">								
											<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
												<tr>
												<tr>
													<td>
														<?php
														if($alteracao == "true"){
																echo '<button type="submit" class="button" name="submit" formmethod="post"  formaction="alterar.php"><span>Confima Alteraçao</span></button>';
														}
														?>										
													</td>
												</tr>									
													<td>
														<?php
														if ($excluir == "true") {
															echo '<button type="submit" class="button" name="codigo" formmethod="post" formaction="excluir.php" value="'.$row['codigo'].'"><span>Confima Exclusão</span></button>';										
														}
														?>
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