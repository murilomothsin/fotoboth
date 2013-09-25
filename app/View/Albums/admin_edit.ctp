<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<script type="text/javascript">

</script>
<div class="row">
	<div class="span12">
	<?php echo $this->Form->create('Album', array('type'=>'file')); ?>
	<fieldset>
		<legend>Editar</legend>
	 	<?php echo $this->element('form_albums'); ?>
	</fieldset>
	<?php 
		echo $this->Form->end('ENVIAR', array( 'class' => 'btn btn-primary'));
	?>
	</div>
</div>

<?php echo $this->Html->script('Albums'); ?>