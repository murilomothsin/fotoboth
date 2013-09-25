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
?>