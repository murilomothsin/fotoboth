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
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('geral');

		//include dos JS
		echo $this->Html->script('vendor/jquery');
		echo $this->Html->script('bootstrap-carousel');
		echo $this->Html->script('bootstrap-transition');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="header" class="container">
		<div class="masthead" style="margin-bottom: -20px;">
			<div class="row">
				<div class="span4"><a href="#">
					<?php
					echo $this->Html->image("logo.png");
					?>
					<!-- <img src="img/logo.png" style="height: 125px;" > --></a></div>
				<div class="span8">
					<ul class="inline nav-pills pull-right" style="margin-top: 55px;">
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
		</div>
		<br />
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
				<div class="offset3 span6"><?php echo $Description ?></div>
			</div>
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
</body>
	

</html>
