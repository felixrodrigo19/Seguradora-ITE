<h1><?php echo $titulo; ?></h1>

<a href='http://localhost/eng3/index.php/cobertura/cadastrar' >NOVO</a>

<table border="1">
	<tr>
		<td>Código da Cobertura</td>
		<td>Descricao</td>
		<td>Opções</td>
	</tr>

	<?php
		foreach ($tabela as $linha) {
			echo "<tr>" . 
						"<td>" . $linha->idcobertura . "</td>" . 
						"<td>" . $linha->descricao . "</td>" . 
						"<td><a href='http://localhost/eng3/index.php/cobertura/alterar/" . $linha->idcobertura . "'>Alterar</a>|<a href='http://localhost/eng3/index.php/cobertura/deletar/" . $linha->idcobertura . "'>Excluir</a></td>" . 
					"</tr>";
		}
	?>
</table>
