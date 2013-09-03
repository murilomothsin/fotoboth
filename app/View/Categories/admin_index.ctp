
<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?><div class="row">
	<div class="large-12 columns">
		<h3>Categorias</h3>
	</div>
<div>
	<ul>
		<li><?php echo $this->Html->link('Adicionar', array('action' => 'add')); ?></li>
	</ul>
</div>
<div class="large-12 columns">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Categoria</th>
				<th>Descrição</th>
				<th>Ações</th>
			</tr>
		</thead>
	<?php

	$i = 0;
	foreach ($categories as $category)
	{
	   $class = null;
	   if($i++ % 2 == 0)
	   {
		  $class = '';
	   }

	?>
	   <tr <?php echo $class; ?>>
		  <td><?php echo $category['Category']['id']; ?></td>
		  <td><?php echo $category['Category']['category']; ?></td>
		  <td><?php echo $category['Category']['description']; ?></td>
		  <td class='actions'>
		  <?php
		  echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $category['Category']['id']), array('escape' => false, 'style' => 'padding: 5px'));
		  echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $category['Category']['id']), array('confirm' => 'Você tem certeza que quer excluir esta categoria?', 'escape' => false, 'style' => 'padding: 5px'));
		  ?>
		  </td>
	   </tr>
	<?php } ?>
	</table>
</div>
</div>
