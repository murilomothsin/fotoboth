<style type="text/css">
.msg_area {
	float: right;
	width: 250px;
	height: 150px;
	margin-top: -260px;
}
.formContato {
	border: 1px solid #CCC;
	padding: 5px;
	width: 500px;
	height: 400px;
	border-radius: 3px;
}
</style>
<div class="row">
<div class="span6">
	<?php echo $this->Form->create('Email'); ?>
	<fieldset class="formContato">
		<h2>Contato</h2>
	 	<?php
			echo $this->Form->input('nome', array( 'placeholder' => 'Nome',
													'label' => array('text' => 'Nome: ')));
			echo $this->Form->input('telefone', array( 'placeholder' => 'Telefone',
													'label' => array('text' => 'Telefone: ')));
			echo $this->Form->input('email', array( 'type' => 'email', 
											'placeholder' => 'E-mail',
											'label' => array('text' => 'E-mail: ')));
			echo $this->Form->input('endereco', array( 'placeholder' => 'Endereço',
													'label' => array('text' => 'Endereço: ')));
			$events = array('0' => 'Outro', 
							'1' => 'Aniversário', 
							'2' => 'Casamento',
							'3' => 'Ensaio de Studio',
							'4' => 'Ensaio Externo',
							'5' => 'Book');
			echo $this->Form->input('evento', array('options' => $events, 
													'default' => '0',
													'label' => array('text' => 'Evento: ')));
			echo $this->Form->input('Mensagem', array('div' => 'msg_area',
														'type' => 'textarea',
														'style' => 'width: 95%; height: 100%',
														'rows' => '5',
														'placeholder' => 'Digite sua mensagem...',
														'label' => array('text' => 'Mensagem: ')));
		?>
	</fieldset>
	<?php 
	$options = array(
		'label' => 'Enviar',
		'class' => 'btn',
		'style' => 'margin-top: -120px; margin-left: 255px;'
	);
	echo $this->Form->end($options); ?>
</div>
<div class="span6">
	<div class="hero-unit">
	<h2>Endereço</h3>
	<adress>Av. Borges de Medeiros - 1836 <br>
		95690-000 Rolante, Brazil <br>

	</adress>
	</div
</div>
</div>