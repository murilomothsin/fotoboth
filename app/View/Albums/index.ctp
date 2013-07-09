<div class="row">
	<div class="large-12 columns">
		<h3>Albuns</h3>
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
		  <th>Titulo</th>
		  <th>Descrição</th>
		  <th>Local</th>
		  <th>Fotografo</th>
		  <th>modelo</th>
		  <th>Quando</th>
		  <th>Categoria</th>
		  <th>Ações</th>
	   </tr>
	<?php

	$i = 0;
	foreach ($albums as $album)
	{
	   $class = null;
	   if($i++ % 2 == 0)
	   {
		  $class = '';
	   }

	?>
	   <tr <?php echo $class; ?>>
		  <td><?php echo $album['Album']['id']; ?></td>
		  <td><?php echo $album['Album']['title']; ?></td>
		  <td><?php echo $album['Album']['description']; ?></td>
		  <td><?php echo $album['Album']['place']; ?></td>
		  <td><?php echo $album['Album']['photographer']; ?></td>
		  <td><?php echo $album['Album']['model']; ?></td>
		  <td><?php echo $album['Album']['when']; ?></td>
		  <td><?php echo $album['Album']['category_id']; ?></td>
		  <td class='actions'>
		  <?php
		  echo $this->Html->link('Editar', array('action' => 'edit', $album['Album']['id']));
		  echo $this->Form->postLink('Deletar', array('action' => 'delete', $album['Album']['id']), array('confirm' => 'Você tem certeza que quer excluir este album?'));
		  ?>
		  </td>
	   </tr>
	<?php } ?>
	</table>
</div>
</div>
