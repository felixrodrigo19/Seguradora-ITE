<h1><?php echo $titulo; ?></h1>
<?php echo form_open('estado/salvaralterar'); 
//var_dump($tabela);
?>

	<input type="hidden"q name="idestado" value="<?php echo $tabela[0]->idestado; ?>">

	<label>Nome</label>
	<input type='text' name='nome' value="<?php echo $tabela[0]->nome ?>" />

	<br/>
	<br/>

	<label>Sigla</label>
	<input type="text" name="sigla" value="<?php echo $tabela[0]->sigla ?>">

	<br/>
	<br/>

	<input type="submit" value='Enviar'>
</form>