<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<div class="row">
	<div class="large-12 columns">
		<h3>Fotos</h3>
	</div>
<div class="large-12 columns">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Dir</th>
				<th>file_size</th>
				<th>album</th>
				<th>criado</th>
				<th>Actions</th>
			</tr>
		</thead>
	<?php

	$i = 0;
	foreach ($pictures as $picture)
	{
	   $class = null;
	   if($i++ % 2 == 0)
	   {
		  $class = '';
	   }

	?>
	   <tr <?php echo $class; ?>>
		  <td><?php echo $picture['Picture']['id']; ?></td>
		  <td><?php echo $picture['Picture']['title']; ?></td>
		  <td><?php echo $picture['Picture']['dir']; ?></td>
		  <td><?php echo $picture['Picture']['file_size']; ?></td>
		  <td><?php echo $picture['Album']['title']; ?></td>
		  <td><?php echo $picture['Picture']['created']; ?></td>
		  <td class='actions'>
		  <?php
		  $icon = 'icon-star-empty';
		  if($picture['Picture']['capa'])
		  	$icon = 'icon-star';
		  echo $this->Html->link('<i class="'.$icon.'"></i>', array('action' => 'NaCapa', $picture['Picture']['id']), array('escape' => false, 'style' => 'padding: 5px'));
		  echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $picture['Picture']['id']), array('confirm' => 'Você tem certeza que quer excluir esta foto?', 'escape' => false, 'style' => 'padding: 5px'));
		  ?>
		  </td>
	   </tr>
	<?php } ?>
	</table>
</div>
</div>
