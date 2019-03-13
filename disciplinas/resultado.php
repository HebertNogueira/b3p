						<fieldset class="grupo">
							<div class="campo">
							<h3>Disciplinas Cadastradas  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<?php if($dadosExcluir=="1") echo "<font color=red>{</font>Disciplina <font color=red>$codigoGet</font> excluida com sucesso<font color=red>}</font> </h3>";
									else if ($_POST['checkbox']=="excluir") echo "<font color=red>{</font>Disciplina <font color=red>$codigoGet</font> já utilizada, não pode excluir<font color=red>}</font> </h3>"; ?>
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr>
										<td style="width: 10em">
											<label for="txtListar"> Código </label>
										</td>
										<td style="width: 40em">
											<label for="txtListar" > &nbsp&nbsp Disciplina </label>
										</td>
										<td style="width: 4em">
											<label for="txtListar"> &nbsp Online? </label>
										</td>
										<td style="width: 5em">
											<label for="txtListar"></label>
										</td>
										<td style="width: 5em">
											<label for="txtListar"></label>
										</td>											
									</tr>		
								<?php
										do {
											if($resultDisciplinas['dOnline']=="S") $dOnline = "Sim";
											else $dOnline = "Não";
								?>
									<tr>
										<td align='center'>
											<input type="text" name="codigo" style="width: 95%" value="<?php echo $resultDisciplinas['codDisciplina'] ?>" disabled/>
										</td>
										<td align='center'>
											<input type="text" name="disciplina" style="width: 95%" value="<?php echo $resultDisciplinas['disciplina'] ?>" disabled/>
										</td>
										<td align='center'>
											<input type="text" name="online" style="width: 95%" value="<?php echo $dOnline ?>" disabled/>
										</td>										
										<form action="../disciplinas/alterar.php?codigoGet=<?php echo $resultDisciplinas['codDisciplina']?>" method="post">
										<td>
											<input type="checkbox" name="checkbox" value="alterar" style="display:none" checked>
											<button type="submit" name="submit" class="button"><span>Alterar</span></button></form>											
										</td>
										<form action="../disciplinas/disciplinas_listar.php?codigoGet=<?php echo $resultDisciplinas['codDisciplina']?>" method="post">
										<td>
											<input type="checkbox" name="checkbox" value="excluir" style="display:none" checked>
											<button type="submit" name="submit" class="button"><span>Excluir</span></button></form>											
										</td>
									</tr>
								<?php
											} while($resultDisciplinas = mysqli_fetch_assoc($dadosDisciplinas));
								?>
								</table>
							</div>
						</fieldset>