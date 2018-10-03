<h1><?php echo $titulo; ?></h1>
<?php echo form_open('estado/incluir'); ?>

	<label>Nome</label>
	<input type='text' name='nome' size="30">

	<br/>
	<br/>

	<label>Sigla</label>
	<input type="text" name="sigla" size="2">

	<br/>
	<br/>

	<input type="submit" value='Enviar'>
</form>