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

		echo $this->Html->css('foundation');
		echo $this->Html->css('geral');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header" class="row">
			<div class="large-4 columns">
				<img src="img/logo.png">
			</div>
			<div class="large-8 columns">
				<ul class="inline-list">
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
		<div id="content" class="row">
			<div class="large-12 columns">
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<div id="footer" class="row">
			<div class="large-12 columns">
				<div class="small-6 small-centered columns"><?php echo $Description ?></div>
			</div>
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
</body>
</html>
