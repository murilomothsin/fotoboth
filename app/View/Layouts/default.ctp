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

		echo $this->Html->css('bootstrap/bootstrap');
		echo $this->Html->css('bootstrap/bootstrap-responsive');
		echo $this->Html->css('uploadify/uploadify');
		?>
		<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<?php
		echo $this->Html->css('geral');

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
					<?php
					echo $this->Html->link($this->Html->image("logo.png", array('class' => 'logo')), '/', array('escape' => false));
					?></div>
				<div class="span8">
					<ul class="inline nav-pills pull-right" style="margin-top: 55px;">
							<li>
								<?php echo $this->Html->link('Home', '/home', array('class' => 'menu')); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Loja', '/loja', array('class' => 'menu')); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Book', '/book', array('class' => 'menu')); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Eventos', '/eventos', array('class' => 'menu')); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Externas', '/externas', array('class' => 'menu')); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Videos', '/videos', array('class' => 'menu')); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Contato', '/contato', array('class' => 'menu')); ?>
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
			<div class="span8" style="font-size: 12px; padding: 10px;">
				<span style=" float: right;">Foto Both - Momentos Especiais Merecem Registros Especiais - fotoboth@fotoboth.com.br - (51) 3547-1169</span>
			</div>
			<div class="span3">
				<ul class="inline" style="float: right;">
					<li style="width: 35px;"><a href="#"><i class="icon-google-plus icon-large googleplus" style="padding: 5px;"></i></a></li>
					<li style="width: 35px;"><a href="https://www.facebook.com/foto.both.1" target="_blank"><i class="icon-facebook icon-large facebook" style="padding: 5px;"></i></a></li>
					<li style="width: 35px;"><a href="http://fotoboth.blogspot.com.br/" target="_blank"><div class="blogger"></div></a></li>
					<li style="width: 35px;"><a href="http://www.youtube.com/channel/UCobr8WoQU3C1LcXqI6bD55g" target="_blank"><i class="icon-youtube icon-large youtube" style="padding: 5px;"></i></a></li>
				</ul>
			</div>
		</div>
		<center><span class="desenvolvedor">Desenvolvido por Murilo Mothsin</span></center>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
</body>

<?php
	//include dos JS
	echo $this->Html->script('vendor/jquery');
	echo $this->Html->script('bootstrap/bootstrap-carousel');
	echo $this->Html->script('bootstrap/bootstrap-tab');
	echo $this->Html->script('bootstrap/bootstrap-transition');
	echo $this->Html->script('bootstrap/bootstrap-dropdown');
	echo $this->Html->script('bootstrap/bootstrap-modal');
	echo $this->Html->script('uploadify/jquery.uploadify.min');
	echo $this->Html->script('geral');
	echo $this->Html->script('Albums');

?>

</html>
