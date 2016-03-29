<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<div class="span6">
	<?php echo $this->Form->create('Pages'); ?>
	<fieldset>
		<legend>Adicionar</legend>
	 	<?php
			echo $this->Form->input('title', array('class' => 'input-xxlarge',
												 'div'   => array('class' => 'control-group'),
												 'label' => 'Título *')
			);
			echo $this->Form->input('content', array('class' => 'input-xxlarge',
												 'div'   => array('class' => 'control-group'),
												 'label' => 'Conteúdo')
			);
			echo $this->Form->input('url', array('class' => 'input-xxlarge',
												 'div'   => array('class' => 'control-group'),
												 'label' => 'URL *',
												 'after' => '<div>* Permitido apenas números, letras e underlines( _ ).</div>')
			);
		?>
	</fieldset>
	<?php 
	$options = array(
			'label' => 'Enviar',
			'class' => 'btn btn-large btn-primary'
		);
	echo $this->Form->end($options); ?>
</div>

<div class="span5" style="padding-top: 150px;">

	<span>Lista de comandos:</span>
	<ul>
		<li><code>&lt;u&gt;&lt;/u&gt;</code> <b>Negrito</b></li>
		<li><code>&lt;i&gt;&lt;/i&gt;</code> <i>Itálico</i></li>
		<li><code>&lt;u&gt;&lt;/u&gt;</code> <u>Sublinhado</u></li>

		<li><code>&lt;h1&gt;&lt;/h1&gt;</code> Cabeçalho 1</li>
		<li><code>&lt;h2&gt;&lt;/h2&gt;</code> Cabeçalho 2</li>
		<li><code>&lt;h3&gt;&lt;/h3&gt;</code> Cabeçalho 3</li>
		<li><code>&lt;a src="http://google.com"&gt;&lt;/a&gt;</code> Atalho para o site contido no 'src'</li>
	</ul>
	
</div>