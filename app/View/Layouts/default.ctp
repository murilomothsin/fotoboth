<?php

$Description = 'Foto Both - Momentos especiais merecem registros especiais';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
		<?php echo $Description ?>:
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('geral');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header" class="row">
			<div class="span4">
				<img src="img/logo.png">
			</div>
			<div class="span8">
				<ul class="inline">
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Loja</a>
					</li>
					<li>
						<a href="#">Book</a>
					</li>
					<li>
						<a href="#">Eventos</a>
					</li>
					<li>
						<a href="#">Externas</a>
					</li>
					<li>
						<a href="#">Videos</a>
					</li>
					<li>
						<a href="#">Contato</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="content" >
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="row">
			<div class="span12">
				<div class="offset-3 span6"><?php echo $Description ?></div>
			</div>
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
</body>
</html>
