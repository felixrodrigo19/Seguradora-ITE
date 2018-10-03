<h1><?php echo $titulo; ?></h1>
<?php echo form_open('cobertura/salvardelete'); 
//var_dump($tabela);
?>

	<input type="hidden" name="idcobertura" value="<?php echo $tabela[0]->idcobertura; ?>">

	<label>Descrição</label>
	<input type='text' name='descricao' value="<?php echo $tabela[0]->descricao ?>" />
	
	<br/>
	<br/>

	<input type="submit" value='Confirmar'>
</form>