<?php
	include "../config.php";
	include "../connect.php";

	$ex1 = 'usuarios';
	$ex2 = 'qDisciplinas';
	$ex3 = 'qCampus';
	$ex4 = 'questoes';
	$ex5 = 'prova';
	$ex6 = 'cursoArea';
	$ex7 = 'pCurso';
	$cont = 0;
	$ex = 'false';
	
	if(!isset($_POST['codigo'])) {
		//Voltar para index 
	}else{
		$codigo = $_POST['codigo'];
		for ($i = 1; $i <8; $i++ ){
			if($i == 1){
				$f=$ex1;
			}
			if($i == 2){
				$f=$ex2;
			}
			if($i == 3){
				$f=$ex3;
			}
			if($i == 4){
				$f=$ex4;
			}
			if($i == 5){
				$f=$ex5;
			}
			if($i == 6){
				$f=$ex6;
			}
			if($i == 7){
				$f=$ex7;
			}
			$queryUsuario = sprintf("SELECT cadastrou FROM $f WHERE cadastrou = $codigo");
			$rsUsuario = mysqli_query($conecta,$queryUsuario) or die(mysql_error());
			$linhaUsuario = mysqli_num_rows($rsUsuario);
			$cont = $cont + $linhaUsuario;			
		}	
		if($cont < 1){
			$queryExcluir = sprintf("DELETE FROM usuarios WHERE codigo = $codigo");
			$rsUsuario = mysqli_query($conecta,$queryExcluir) or die(mysql_error());
			$ex = 'true'; 
		}
	}
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
						<?php
							if ($ex == "true") {
								echo '<fieldset class="grupo"><div class="campo"><label for="txtListar"><label><h3>Registro Excluído com Sucesso !!!</h3></label>';
							}else{
								echo '<fieldset class="grupo"><div class="campo"><label for="txtListar"><label><h3>Este Registro não pode ser excluido, apenas pode ser desativado.</h3></label>';
							} 
						?>
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
