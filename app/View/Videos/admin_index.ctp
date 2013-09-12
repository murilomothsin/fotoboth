
<?php  $helpers = array('Link'); ?>
<?php echo $this->Link->makeLink(); ?><div class="row">
	<div class="large-12 columns">
		<h3>Videos</h3>
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
				<th>Video</th>
				<th>Embed</th>
				<th>Ações</th>
			</tr>
		</thead>
	<?php

	$i = 0;
	foreach ($videos as $video)
	{
	?>
	   <tr>
		  <td><?php echo $video['Video']['id']; ?></td>
		  <td><?php echo $video['Video']['video']; ?></td>
		  <td>teste</td>
		  <td class='actions'>
		  <?php
		  echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $video['Video']['id']), array('escape' => false, 'style' => 'padding: 5px'));
		  echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $video['Video']['id']), array('confirm' => 'Você tem certeza que quer excluir esta categoria?', 'escape' => false, 'style' => 'padding: 5px'));
		  ?>
		  </td>
	   </tr>
	<?php } ?>
	</table>
</div>
</div>
