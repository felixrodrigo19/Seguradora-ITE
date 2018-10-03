<h1><?php echo $titulo; ?></h1>

<a href='http://localhost/eng3/index.php/beneficios/cadastrar' >NOVO</a>

<table border="1">
	<tr>
		<td>Código do Beneficio</td>
		<td>Descricao</td>
		<td>Ativo</td>
		<td>Opções</td>
	</tr>

	<?php
		foreach ($tabela as $linha) {
			echo "<tr>" . 
						"<td>" . $linha->idbeneficios . "</td>" . 
						"<td>" . $linha->descricao . "</td>" . 
						"<td>" . $linha->ativo . "</td>" . 
						"<td><a href='http://localhost/eng3/index.php/beneficios/alterar/" . $linha->idbeneficios . "'>Alterar</a>|<a href='http://localhost/eng3/index.php/beneficios/deletar/" . $linha->idbeneficios . "'>Excluir</a></td>" . 
					"</tr>";
		}
	?>
</table>
