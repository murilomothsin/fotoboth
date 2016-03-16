<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<div>
	<?php echo $this->Form->create('Page'); ?>
	<fieldset>
		<legend>Adicionar</legend>
	 	<?php
			echo $this->Form->input('title');
			echo $this->Form->input('content');
			echo $this->Form->input('url');
		?>
	</fieldset>
	<?php 
	$options = array(
			'label' => 'Enviar',
			'class' => 'btn btn-large btn-primary'
		);
	echo $this->Form->end($options); ?>
</div>