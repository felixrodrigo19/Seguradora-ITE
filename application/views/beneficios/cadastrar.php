<h1><?php echo $titulo; ?></h1>
<?php echo form_open('beneficios/incluir'); ?>

	<label>Descrição</label>
	<input type='text' name='descricao' size="60">

	<br/>
	<br/>

	<label>Ativo</label>
	<input type='number' name='ativo' min="0" max="1">

	<br/>
	<br/>

	<input type="submit" value='Enviar'>
</form>