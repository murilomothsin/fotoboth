<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<div>
	<?php echo $this->Form->create('Picture', array('type'=>'file'));?>  
	<fieldset>
	<legend>Adicionar imagem para capa</legend>
	<?php
	echo $this->Form->input('title');
	echo $this->Form->input('Img', array('type'=>'file'));
	?>
	</fieldset>
	<?php echo $this->Form->end('Upload'); ?>
</div>