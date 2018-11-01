<h1><?php echo $titulo; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('cobertura/incluir'); ?>

	<label>Descrição</label>
	<input type='text' name='descricao' size="60">

	<br/>
	<br/>

	<input type="submit" value='Enviar'>
</form>