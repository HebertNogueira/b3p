<?php
	include "../config.php";
	include "../connect.php";

	$borda = "0";
		
	$nome = "";
	$rgm = "";
	$coordena = "";
	$mail = "";
	$codigo = "";
		
	$nCadastro = $_SESSION['check'];
	$gravou = $_SESSION['gravou'];
	
	if($gravou == 'true'){
		$gRgm = $_SESSION['rgm'];	
	}
	
	if ($nCadastro == 'true'){
		if ($gravou  == 'true'){
					
			$queryUsuario = sprintf("SELECT codigo,rgm,nome,email,coordena FROM usuarios where rgm=$gRgm");
			$rsCarregaDados = mysqli_query($conecta,$queryUsuario) or die(mysql_error());
			
			$row = mysqli_fetch_assoc($rsCarregaDados);
			echo $row['codigo'] . " ";  
			echo $row['rgm'] . " ";
			echo $row['nome'] . " ";
			echo $row['email'] . " ";
			echo $row['coordena'] . " ";
			
		}
	}

?>
<html>
	<head>
		<title>B3P - Banco de Perguntas Para Provas</title>
		<link rel="stylesheet" type="text/css" href="../style.css"/>
			
		<script language="javascript" type="text/javascript">
			function validar() {
			var nome = form1.nome.value;
			var rgm = form1.rgm.value;
			var mail = form1.mail.value;
			var senha = form1.senha.value;
			var senhaC = form1.senhaC.value;
			
			if (nome == "") {
				alert('Preencha o campo com seu nome');
				form1.nome.focus();
			return false;
			}
						
			if (nome.length < 5) {
				alert('Digite seu nome completo');
				form1.nome.focus();
				return false;
			}
			if (rgm == "") {
				alert('Preencha o campo de RGM');
				form1.rgm.focus();
				return false;
			}
			if (mail == "") {
				alert('Preencha o campo de e-mail');
				form1.mail.focus();
				return false;
			}
			if (senha != senhaC) {
				alert('Senhas diferentes');
				form1.senha.focus();
				return false;
			}
			
			if (senha == "") {
				alert('Preencha o campo de senha');
				form1.senha.focus();
				return false;
			}
			if(isNaN(rgm)) {
				alert("O campo RGM deve ser numérico");
				form1.rgm.focus();	
				return false;
			}

			if (senhaC == "") {
				alert('Preencha a confirmação de senha');
				form1.senhaC.focus();	
				return false;
			}	
			if (senha.length < 5) {
				alert('Senha deve ter 5 caracteres');
				form1.senha.focus();
			return false;				
			}
		}
		</script>		
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
			
							<!--INICIO-DO-CONTEUDO-DA-PAGINA-->
								<form name="form1" action="incluir_02.php" method="post" >
										
										<fieldset class="grupo">
											<div class="campo">
												<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
													<tr><!--Linha 2 -->
														<td><!--Label e campo de Nome-->
															<label for="txtDificuldade" >Dados Cadastrais</label>
														</td>
													</tr>
												</table>
											</div>
										</fieldset>
										
										<fieldset class="grupo">
											<div class="campo">
												<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
													<tr><!--Linha 1 -->
														<!--Label e campo RGM-->
														<td>
															<label for="txtRGM">RGM:</label>
														</td>
														<td>
															<input type="text" id="rgm" name="rgm" style="width: 10em" maxlength="8" value="<?php if ($gravou) {echo "$rgm";} ?>"  />
														</td>
													</tr>
													
													
												</table>
											</div>
										</fieldset>
										
										<fieldset class="grupo">
											<div class="campo">
												<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
														<tr><!--Linha 2 -->
															<td><!--Label e campo de NOME-->
																<label for="txtNome">Nome:&nbsp</label>
															</td>
														<td>
															<input type="text" id="nome" name="nome" style="width: 20em" />
														</td>	
														<td><!--Label e Checkbox COORDENA-->
															<label for="txtCoordena">&nbspCoordena:&nbsp</label>
															</td>
														<td>
															<input type="checkbox" id="coordena" name="coordena" />
														</td>	
														
													</tr>
												</table>
											</div>
										</fieldset>
										
										<fieldset class="grupo">
											<div class="campo">
												<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
														<tr><!--Linha 2 -->
															<td><!--Label e campo de EMAIL-->
																<label for="txtEmail">E-mail:&nbsp</label>
															</td>
														<td>
															<input type="text" id="mail" name="mail" style="width: 25em"value="" />
														</td>	
													</tr>
												</table>
											</div>
										</fieldset>
										
										<fieldset class="grupo">
											<div class="campo">
												<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
														<tr><!--Linha 2 -->
															<td><!--Label e campo de SENHA-->
																<label for="txtSenha">Senha:&nbsp</label>
															</td>
															<td>
																<input type="password" id="senha" name="senha" style="width: 10em" />
															</td>
															<td><!--Label e campo de Confirmação de SENHA-->
																<label for="txtRepSenha">&nbspConfirma:&nbsp</label>
															</td>
															<td>
																<input type="password" id="senhaC" name="senhaC" style="width: 10em" value="" />
															</td>												
													</tr>
												</table>
											</div>
										</fieldset>

									<?php if ($gravou == 'false') echo '<input type="submit" class="button" value="Cadastrar" name="submit" onclick="return validar()" />' ; ?>
									
								</form>	
								
							<!--FIM-DO-CONTEUDO-DA-PAGINA-->
							<?php if ($gravou == 'true') echo "Cadstro efetuado com Sucesso" ; ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</DIV>
</body>
</html>