<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<div>
	<?php echo $this->Form->create('Video'); ?>
	<fieldset>
		<legend>Editar</legend>
	 	<?php
			echo $this->Form->input('video');
			echo $this->Form->input('embed');
		?>
	</fieldset>
	<?php echo $this->Form->end('Salvar'); ?>
</div>