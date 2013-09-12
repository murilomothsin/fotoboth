<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<div>
	<?php echo $this->Form->create('Video'); ?>
	<fieldset>
		<legend>Adicionar</legend>
	 	<?php
			echo $this->Form->input('video');
			echo $this->Form->input('embed');
		?>
	</fieldset>
	<?php echo $this->Form->end('ENVIAR'); ?>
</div>
<div>
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('Listar', array('action' => 'index')); ?></li>
	</ul>
</div>
