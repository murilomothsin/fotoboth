<?php

$Description = 'Foto Both - Momentos especiais merecem registros especiais';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $this->Html->charset(); 
	echo $this->Html->meta('description', $Description);

	?>
	<title>
		<?php echo $title_for_layout; ?>
		<?php echo $Description ?>:
	</title>
	<?php
		// echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('geral');

		//include dos JS
		echo $this->Html->script('vendor/jquery');
		echo $this->Html->script('bootstrap-carousel');
		echo $this->Html->script('bootstrap-tab');
		echo $this->Html->script('bootstrap-transition');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="header" class="container">
		<div class="masthead" style="margin-bottom: 40px; margin-top: 10px;">
			<div class="row">
				<div class="span4">
					<?php echo $this->Html->link($this->Html->image("logo.png"), '/', array('escape' => false)); ?></div>
				<div class="span8">
					<ul class="inline nav-pills pull-right" style="margin-top: 55px;">
							<li>
								<?php echo $this->Html->link('Home', '/home'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Loja', '/loja'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Book', '/book'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Eventos', '/eventos'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Externas', '/externas'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Videos', '/videos'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Contato', '/contato'); ?>
							</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="content" class="container">
			<div class="row">
				<div class="span12">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
		<div id="footer" class="row">
			<div class="span12">
				<center><?php echo $Description ?></center>
			</div>
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
</body>
	

</html>
