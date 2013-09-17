<style type="text/css">
.msg_area {
	float: right;
	width: 250px;
	height: 150px;
	margin-top: -260px;
}
.formContato {
	border: 1px solid #EFFFFF;
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
			$events = array('outro' => 'Outro',
							'duvida' => 'Dúvida',
							'sugestao' => 'Sugestão',
							'reclamacao' => 'Reclamação',
							'orcamento' => 'Orçamento');
			echo $this->Form->input('evento', array('options' => $events,
													'default' => '0',
													'label' => array('text' => 'Assunto: ')));
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
		<p><b>Endereço:</b> Av. Borges de Medeiros, Rolante - RS, 95690-000</p>
<p><b>Telefone:</b> (51) 3547-1169   -   (51) 9905-6665</p>
<p><b>Horário:</b> Segunda a Sexta 08:30–11:30, 13:30–19:00
					<span style="margin-left: 75px;">Sábado 08:00–12:00</span></p>
	</div
</div>
</div>