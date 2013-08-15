<?php  $helpers = array('Link'); ?>
<div class="row">
<?php echo $this->Link->makeLink(); ?>

	<div class="large-12 columns">
		<legend><?php echo __('Albuns'); ?></legend>
	</div>
<div class="large-12 columns">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
		<thead>
		   <tr>
			  <th>Id</th>
			  <th>Titulo</th>
			  <th>Descrição</th>
			  <th>Local</th>
			  <th>Fotografo</th>
			  <th>modelo</th>
			  <th>Quando</th>
			  <th>Categoria</th>
			  <th>&nbsp;</th>
		   </tr>
	   </thead>
	   <tbody>
		<?php
		foreach ($albums as $album) {
		?>
		   <tr>
			  <td><?php echo $album['Album']['id']; ?></td>
			  <td><?php echo $album['Album']['title']; ?></td>
			  <td><?php echo $album['Album']['description']; ?></td>
			  <td><?php echo $album['Album']['place']; ?></td>
			  <td><?php echo $album['Album']['photographer']; ?></td>
			  <td><?php echo $album['Album']['model']; ?></td>
			  <td><?php echo $album['Album']['when']; ?></td>
			  <td><?php echo $album['Category']['category']; ?></td>
			  <td>
			  <?php
			  echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $album['Album']['id']), array('escape' => false, 'style' => 'padding: 5px'));
			  echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $album['Album']['id']), array('confirm' => 'Você tem certeza que quer excluir este album?',
		  		'escape' => false, 'style' => 'padding: 5px'));
			  ?>
			  </td>
		   </tr>
		<?php } ?>
	</tbody>
	</table>
</div>
</div>