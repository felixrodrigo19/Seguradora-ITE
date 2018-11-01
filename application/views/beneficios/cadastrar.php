<h1><?php echo $titulo; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('beneficios/incluir'); ?>

	<label>Descrição</label>
	<input type='text' name='descricao' size="60">

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