					<?php 
					session_start();
					include "../connect.php";
					
					if($_POST['tipoPergunta'] != null){ ?>
						
								<?php
										do {
											
												$queryDisciplina = "select * from qdisciplinas where codDisciplina=$resultFiltro[disciplina] ";
												$dadosDisciplina= mysqli_query($conecta,$queryDisciplina) or die(mysql_error($conecta));
												$resultDisciplina = mysqli_fetch_assoc($dadosDisciplina);
												$queryCadastrou = "select * from usuarios";								
												$dadosCadastrou = mysqli_query($conecta,$queryCadastrou) or die(mysqli_error($conecta));
												$resultCadastrou = mysqli_fetch_assoc($dadosCadastrou);
											
											if($resultFiltro['ativo']=="S") $resultAtivo="SIM";
											else $resultAtivo="NÃO";
								?>
									<tr>
										<form action="../perguntas_listar/alterar.php?codigoGet=<?php echo $resultFiltro['codQuestao']?>" method="post">
										<td>
											<button type="submit" name="submit" class="button"><span>Alterar</span></button></form>											
										</td>
										<td align='center'>
											<input type="text" name="codigo" style="width: 98%" value="<?php echo $resultFiltro['codQuestao'];?>" disabled/>
										</td>
													
										<td align='center'>
											<input type="text" name="codigo" style="width: 98%" value="<?php echo $resultFiltro['enunciado'];?>" disabled/>
										</td>
										
										<td align='center' >
											<span data-tooltip aria-haspopup="true" title="<?php echo $resultDisciplina['disciplina'];?>">
												<input type="text" style="width: 98%" value="<?php echo $resultFiltro['disciplina'];?>" disabled/>
											</span>																	
										</td>
										
										<td align='center'>
											<input type="text" style="width: 98%" value="<?php echo $resultAtivo ;?>" disabled/>
										</td>
										
										<td align='center'>
											<input type="text" style="width: 98%" value="<?php echo$resultCadastrou['nome'];?>" disabled/>
										</td>
										
										<td align='center'>
											<input type="text" style="width: 98%" value="<?php echo $dgtTagsArray[$incremento];?>" disabled/>
										</td>
									</tr>
								<?php
											} while($resultFiltro = mysqli_fetch_assoc($dadosFiltro));
							} ?>