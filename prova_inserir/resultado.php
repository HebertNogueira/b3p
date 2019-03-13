					<?php if($_POST['tipoPergunta'] != null){ ?>
						<fieldset class="grupo">
							<div class="campo">
							<h3>Resultado da Busca</h3>
								<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
									<tr>
										<td>
											<label for="txtListar"></label>
										</td>
										<td style="width: 10%" >
											<label for="txtListar" > &nbsp&nbsp Código &nbsp</label>
										</td>
										<td style="width: 60%">
											<label for="txtListar"> &nbsp&nbsp Enunciado &nbsp</label>
										</td>
										<td style="width: 10%">
											<label for="txtListar"> &nbsp&nbsp Disciplina &nbsp</label>
										</td>
										<td style="width: 10%">
											<label for="txtListar"> &nbsp&nbsp Ativo &nbsp</label>
										</td>
										<td style="width: 10%">
											<label for="txtListar"> &nbsp&nbsp Quem Cadastrou &nbsp</label>
										</td>
									</tr>	
								<?php
										do {
								?>
									<tr>
										<form action="../perguntas_listar/alterar.php?codigoGet=<?php echo $resultFiltro['codQuestao']?>" method="post">
										<td>
											<button type="submit" name="submit" class="button"><span>Alterar</span></button></form>											
										</td>
										<td align='center'>
											<input type="text" name="codigo" style="width: 95%" value="<?php echo $resultFiltro['codQuestao'];?>" disabled/>
										</td>
													
										<td align='center'>
											<input type="text" name="codigo" style="width: 95%" value="<?php echo $resultFiltro['enunciado'];?>" disabled/>
										</td>
										
										<td align='center' >
											<input type="text" style="width: 95%" value="<?php echo $resultFiltro['disciplina'];?>" disabled/>																	
										</td>
										
										<td align='center'>
											<input type="text" style="width: 95%" value="<?php echo $resultFiltro['ativo'];?>" disabled/>
										</td>
										
										<td align='center'>
											<input type="text" style="width: 95%" value="<?php echo $resultFiltro['cadastrou'];?>" disabled/>
										</td>
									</tr>
								<?php
											} while($resultFiltro = mysqli_fetch_assoc($dadosFiltro));
								?>
								</table>
							</div>
						</fieldset>	
					<?php } ?>