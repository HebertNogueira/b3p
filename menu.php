<?php
	if (!isset($conecta)){
		include "sair.php";
	} else {
?>
<?php
		if((!isset($_SESSION['logado'])) || ($_SESSION['logado']=="NEUTRAL") || ($_SESSION['logado']=="NAO") ){			
?>
<TABLE BORDER="<?php echo $borda?>" WIDTH=100% style='height: 40px' CELLSPACING=0 background='../../imagens/bg_menu.png'>
		<tr>
			<td>
				<a href="../../bemvindo.php" border='0'><img src='../../imagens/pg_inicial_azul.png'></a>
				<img src='../../imagens/separacao.png'>
			</td>
		</tr>
</TABLE>
<?php
		} else {
?>
<TABLE BORDER="<?php echo $borda?>" WIDTH=100% style='height: 40px' CELLSPACING=0 background='imagens/bg_menu.png'>
		<tr>
			<td>			
				<a href="../../bemvindo.php" border='0'><img src='../../imagens/pg_inicial_azul.png'></a>
				<img src='../../imagens/separacao.png'>
				
				<a href="../../questoes.php" border='0'><img src='../../imagens/questoes_preto.png'></a>
				<img src='../../imagens/separacao.png'>
				
				<img src='../../imagens/provas_preto.png'>
				<img src='../../imagens/separacao.png'>
				
				<a href=".././parametros.php" border='0'><img src='../../imagens/parametros_preto.png'></a>
				<img src='../../imagens/separacao.png'>
			</td>
			<?php
				$rgm = $_SESSION['rgm'];
				$sqlUsuarioLogado = sprintf("SELECT nome FROM usuarios where rgm='$rgm'");
				$queryUsuarioLogado = mysqli_query($conecta,$sqlUsuarioLogado) or die(mysql_error());
				$resultUsuarioLogado = mysqli_fetch_assoc($queryUsuarioLogado);	
			?>
			<td align="right">
				<div class="campo">
					<label>Olá, <?php echo $resultUsuarioLogado['nome']?>!<a href="sair.php"><b> #Sair</b></a></label>
				</div>
			</td>
		</tr>
</TABLE>
<?php
			}
			
		}	
?>