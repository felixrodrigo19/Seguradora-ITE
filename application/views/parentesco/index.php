<h1><?php echo $titulo; ?></h1>

<a href='http://localhost/eng3/index.php/parentesco/cadastrar' >NOVO</a>

<table border="1">
	<tr>
		<td>Código do Parentesco</td>
		<td>Descricao</td>
		<td>Opções</td>
	</tr>

	<?php
		foreach ($tabela as $linha) {
			echo "<tr>" . 
						"<td>" . $linha->idparentesco . "</td>" . 
						"<td>" . $linha->descricao . "</td>" . 
						"<td><a href='http://localhost/eng3/index.php/parentesco/alterar/" . $linha->idparentesco . "'>Alterar</a>|<a href='http://localhost/eng3/index.php/parentesco/deletar/" . $linha->idparentesco . "'>Excluir</a></td>" . 
					"</tr>";
		}
	?>
</table>
