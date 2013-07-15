<div>
	<?php echo $this->Form->create('Album', array('type'=>'file')); ?>
	<fieldset>
		<legend>Adicionar</legend>
	 	<?php
			echo $this->Form->input('title');
			echo $this->Form->input('description');
			echo $this->Form->input('place');
			echo $this->Form->input('photographer');
			echo $this->Form->input('model');
			echo $this->Form->input('when', array( 'class' => 'InputDate', 
													'error' => array(
													'wrap' => 'div', 
													'class' => 'formerror'
													)
									            ));
			echo $this->Form->input('category_id');
			echo $this->Form->input('Picture.0.title');
			echo $this->Form->input('Picture.0.Img', array('type'=>'file'));
			
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
