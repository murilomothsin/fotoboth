<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<script type="text/javascript">

</script>
<div class="row">
	<div class="span12">
	<?php $timeInit = date('dmoHis'); ?>
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
									            )); ?>
	<div id="contentPictures"  class="well well-small">
		<input type="hidden" name="initDate" value="<?php echo $timeInit; ?>" />
		<input height="30" width="110" type="file" name="fileInput" id="fileInput" align="center" />
	</div>
	</fieldset>
	<?php 
		echo $this->Form->end('ENVIAR', array( 'class' => 'btn btn-primary'));
	?>
	</div>
</div>

<?php echo $this->Html->script('vendor/jquery'); 
echo $this->Html->script('uploadify/jquery.uploadify.min'); 
?>

<script type="text/javascript">
    $(document).ready(function(){
        var path = "<?php echo $this->Html->url('/files/uploadify/', true) ?>";
        $('#fileInput').uploadify({
            'swf': path + 'uploader.swf',
            'uploader': path + 'uploadify.php',
            'folder': '/uploads',
            'method': 'post',
            'formData'      : {'User' : '<?php echo AuthComponent::user('username');?>', 'dataInicio' : '<?php echo $timeInit; ?>'},
            'preventCaching': true,
            'fileTypeExts': "*.*; *.jpg; *.png; *.gif",
            'fileTypeDesc': "Image files",
            'fileSizeLimit': '15MB',
            'auto': true,
            'onUploadSuccess': function(file, data, response) {
            	alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':\n' + data);
        	}
        });
    });
</script>