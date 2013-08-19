<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<script type="text/javascript">

</script>
<div class="row">
	<div class="span12">
	<?php echo $this->Form->create('Album', array('type'=>'file')); ?>
	<fieldset>
		<legend>Adicionar</legend>
	 	<?php
			echo $this->Form->input('title', array( 'class' => 'input-xxlarge', 
													'placeholder' => 'Título',
													'error' => array(
													'wrap' => 'div', 
													'class' => 'formerror'
													)
									            ));
			echo $this->Form->input('description', array( 'class' => 'input-xxlarge', 
													'placeholder' => 'Descrição',
													'error' => array(
													'wrap' => 'div', 
													'class' => 'formerror'
													)
									            ));
			echo $this->Form->input('place', array( 'class' => 'input-xlarge', 
													'placeholder' => 'Local',
													'error' => array(
													'wrap' => 'div', 
													'class' => 'formerror'
													)
									            ));
			echo $this->Form->input('photographer', array( 'class' => 'input-xlarge', 
													'placeholder' => 'Fotografo',
													'error' => array(
													'wrap' => 'div', 
													'class' => 'formerror'
													)
									            ));
			echo $this->Form->input('model', array( 'class' => 'input-xlarge', 
													'placeholder' => 'Modelo',
													'error' => array(
													'wrap' => 'div', 
													'class' => 'formerror'
													)
									            ));
			echo $this->Form->input('when', array(
											    'class' => 'input-small',
											    'dateFormat' => 'DMY',
											));
			echo $this->Form->input('category_id', array( 'class' => 'input-xlarge', 
													'error' => array(
													'wrap' => 'div', 
													'class' => 'formerror'
													)
									            ));
			echo $this->Html->link('+', 'javascript:addImage();', array('class' => 'btn', 
															'target' => '_blank',
															'alt' => 'Adicionar mais imagems'));
			echo '<div id="contentPictures"  class="well well-small">';
			echo $this->Form->input('Picture.0.title', array( 'class' => 'input-xlarge', 
													'placeholder' => 'Título da foto',
													'error' => array(
													'wrap' => 'div', 
													'class' => 'formerror'
													)
									            ));
			echo $this->Form->input('Picture.0.Img', array('type'=>'file', 'onChange' => 'ImagePreview(0)'));
		?>
		<input id="file_upload" name="file_upload" type="file" />
	<a href="javascript:$('#file_upload').uploadifyUpload();">Upload dos arquivos</a>

	</div>
	</fieldset>
	<?php 
		echo $this->Form->end('ENVIAR', array( 'class' => 'btn btn-primary'));
	?>
	</div>
</div>

<?php echo $this->Html->script('vendor/jquery'); ?>

<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'uploadify.swf',
				'uploader' : 'uploadify.php'
			});
		});
	</script>