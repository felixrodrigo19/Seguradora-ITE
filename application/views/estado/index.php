<h1><?php echo $titulo ?></h1>

<table border="1">
	<tr>
		<td>Código do Estado</td>
		<td>Nome</td>
		<td>Sigla</td>
		<td>Opções</td>
	</tr>

	<?php
		foreach ($tabela as $linha) {
			echo "<tr>" . 
						"<td>" . $linha->idestado . "</td>" . 
						"<td>" . $linha->nome . "</td>" . 
						"<td>" . $linha->sigla . "</td>" . 
						"<td>Alterar|Excluir</td>" . 
					"</tr>";
		}
	?>
</table>