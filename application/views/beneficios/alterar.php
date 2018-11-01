<h1><?php echo $titulo; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('beneficios/salvaralterar'); 
//var_dump($tabela);
?>

	<input type="hidden"q name="idbeneficios" value="<?php echo $tabela[0]->idbeneficios; ?>">

	<label>Descrição</label>
	<input type='text' name='descricao' value="<?php echo $tabela[0]->descricao ?>" />

	<br/>
	<br/>

	<label>Ativo</label>
	<br/>
	
	<select name="ativo">
		<option value="0">Não Ativo</option>
		<option value="1">Ativo</option>
	</select>

	<br/>
	<br/>

	<input type="submit" value='Enviar'>
</form>