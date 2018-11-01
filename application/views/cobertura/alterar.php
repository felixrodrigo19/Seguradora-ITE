<h1><?php echo $titulo; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('cobertura/salvaralterar'); 
//var_dump($tabela);
?>

	<input type="hidden"q name="idcobertura" value="<?php echo $tabela[0]->idcobertura; ?>">

	<label>Descrição</label>
	<input type='text' name='descricao' value="<?php echo $tabela[0]->descricao ?>" />

	<br/>
	<br/>

	<input type="submit" value='Enviar'>
</form>