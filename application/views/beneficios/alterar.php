<h1><?php echo $titulo; ?></h1>
<?php echo form_open('beneficios/salvaralterar'); 
//var_dump($tabela);
?>

	<input type="hidden"q name="idbeneficios" value="<?php echo $tabela[0]->idbeneficios; ?>">

	<label>Descrição</label>
	<input type='text' name='descricao' value="<?php echo $tabela[0]->descricao ?>" />

	<br/>
	<br/>

	<label>Ativo</label>
	<input type='text' name='ativo' value="<?php echo $tabela[0]->ativo ?>" />

	<br/>
	<br/>

	<input type="submit" value='Enviar'>
</form>