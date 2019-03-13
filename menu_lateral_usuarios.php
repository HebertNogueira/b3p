<TABLE BORDER=<?php echo $borda?> CELLSPACING=0>
	<tr>		
		<td>
			<?php 
			$_SESSION ['check'] = 'true';
			$_SESSION ['gravou'] = 'false';				
			?>
			<form method="post" name="Incluir" id="incluir" action="../usuarios/incluir.php">
			<button type="submit" class="button" name="submit" value="Incluir"><span>Incluir</span></button></form>
		</td>		
		<td>
			<form method="post" name="Incluir" id="incluir" action="../usuarios/filtro.php">
			<button type="submit" class="button" name="submit" value="Filtrar"><span>Filtrar</span></button></form>
		</td>
	</tr>
</table>
					