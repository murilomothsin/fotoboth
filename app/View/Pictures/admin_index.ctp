<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?>
<div class="row">
	<div class="large-12 columns">
		<h3>Fotos</h3>
	</div>
<div>
	<ul>
		<li><?php echo $this->Html->link('Adicionar', array('action' => 'add')); ?></li>
	</ul>
</div>
<div class="large-12 columns">
	<table cellpadding="0" cellspacing="0">
	   <tr>
		  <th>Id</th>
		  <th>Title</th>
		  <th>Dir</th>
		  <th>file_size</th>
		  <th>criado</th>
		  <th>Actions</th>
	   </tr>
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
		  <td><?php echo $picture['Picture']['created']; ?></td>
		  <td class='actions'>
		  <?php
		  echo $this->Html->link('Editar', array('action' => 'edit', $picture['Picture']['id']));
		  echo $this->Form->postLink('Deletar', array('action' => 'delete', $picture['Picture']['id']), array('confirm' => 'Você tem certeza que quer excluir esta foto?'));
		  ?>
		  </td>
	   </tr>
	<?php } ?>
	</table>
</div>
</div>
