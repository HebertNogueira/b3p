		<?php	
			if($_POST['tipoPergunta'] != null){
				
				$dgtTags = $_POST['dgtTags'];
				$dgtTagsArray = explode(',', $dgtTags);
				$dgtTagsCount = count($dgtTagsArray);
				$incremento = 0;

				
				do{
					$tipoPergunta = $_POST['tipoPergunta'];	
					$disciplina = $_POST['disciplina'];	
					$Codigo = $_POST['Codigo'];	
					$dificuldade = $_POST['dificuldade'];
					$Alternativas = $_POST['Alternativas'];	
					$queryFiltro = "select * from questoes";
					
					$check = false;

					if ($tipoPergunta != "00"){
						$queryFiltro = $queryFiltro . " where tipoq='$tipoPergunta'";
						$check = true;		
					}
					if ($disciplina != "00"){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " disciplina='$disciplina'";	
						$check = true;
					}
					if ($Codigo != ""){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " codQuestao='$Codigo'";	
						$check = true;		
					}
					if ($dificuldade != "00"){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " dificuldade='$dificuldade'";
						$check = true;
					}
					if ($Alternativas != "00"){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " qtdAlternativa='$Alternativas'";	
					}
					
					if ($dgtTagsArray[$incremento] != null){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " tags like '%$dgtTagsArray[$incremento]%'";	
					}
					
					$dadosFiltro= mysqli_query($conecta,$queryFiltro) or die(mysql_error($conecta));
					$resultFiltro = mysqli_fetch_assoc($dadosFiltro);
					$incremento++;
				} while ($incremento!=$dgtTagsCount);
			}
		?>

<fieldset class="grupo">
	<div class="campo">
		<TABLE BORDER=<?=$borda?> CELLSPACING=0>
		<?php  if(isset($resultFiltro['disciplina'])){ ?>
			<tr>
				<td colspan="7">
					<h3>Resultado da Busca</h3>
				</td>
			</tr>
			<tr>
				<td>
					<label for="txtListar"></label>
				</td>
				<td style="width: 5em" >
					<label for="txtListar" >Código</label>
				</td>
				<td style="width: 34em" >
					<label for="txtListar">Enunciado</label>
				</td>
				<td style="width: 7em" >
					<label for="txtListar">Disciplina</label>
				</td>
				<td style="width: 4em" >
					<label for="txtListar">Ativo</label>
				</td>
				<td style="width: 20em" >
					<label for="txtListar">Quem Cadastrou</label>
				</td>
				<td style="width: 8em" >
					<label for="txtListar">Tag Utilizada</label>
				</td>
			</tr>

		<?php	
			}
			if($_POST['tipoPergunta'] != null){
				
				$dgtTags = $_POST['dgtTags'];
				$dgtTagsArray = explode(',', $dgtTags);
				$dgtTagsCount = count($dgtTagsArray);
				$incremento = 0;

				
				do{
					$tipoPergunta = $_POST['tipoPergunta'];	
					$disciplina = $_POST['disciplina'];	
					$Codigo = $_POST['Codigo'];	
					$dificuldade = $_POST['dificuldade'];
					$Alternativas = $_POST['Alternativas'];	
					$queryFiltro = "select * from questoes";
					
					$check = false;

					if ($tipoPergunta != "00"){
						$queryFiltro = $queryFiltro . " where tipoq='$tipoPergunta'";
						$check = true;		
					}
					if ($disciplina != "00"){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " disciplina='$disciplina'";	
						$check = true;
					}
					if ($Codigo != ""){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " codQuestao='$Codigo'";	
						$check = true;		
					}
					if ($dificuldade != "00"){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " dificuldade='$dificuldade'";
						$check = true;
					}
					if ($Alternativas != "00"){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " qtdAlternativa='$Alternativas'";	
					}
					
					if ($dgtTagsArray[$incremento] != null){
						if ($check == true) $queryFiltro = $queryFiltro . " and ";
						if ($check == false) $queryFiltro = $queryFiltro . " where ";
						$queryFiltro = $queryFiltro . " tags like '%$dgtTagsArray[$incremento]%'";	
					}
					
					
					
					
					$dadosFiltro= mysqli_query($conecta,$queryFiltro) or die(mysql_error($conecta));
					$resultFiltro = mysqli_fetch_assoc($dadosFiltro);
					 if(isset($resultFiltro['disciplina'])){ ?>

		<?php
						include "resultado.php";
						$incremento++;
					 } else {
						 echo "<h3>Não foram encontrados resultados nesta busca</tr>";
						$incremento++;
					 }
				} while ($incremento!=$dgtTagsCount);
			}
		?>
								</table>
							</div>
						</fieldset>