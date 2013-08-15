<?php  $helpers = array('Link'); ?>

<div class="row">
	<?php echo $this->Link->makeLink(); ?>
	<div class="large-12 columns">
		<legend><?php echo __('Usuário'); ?></legend>
	</div>
<div class="large-12 columns">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
	   <tr>
		  <th>Id</th>
		  <th>Nome</th>
		  <th>Username</th>
		  <th>Email</th>
		  <th>Categoria</th>
		  <th>Actions</th>
	   </tr>
	<?php

	$i = 0;
	foreach ($users as $user){	
	?>
	   <tr>
		  <td><?php echo $user['User']['id']; ?></td>
		  <td><?php echo $user['User']['name']; ?></td>
		  <td><?php echo $user['User']['username']; ?></td>
		  <td><?php echo $user['User']['email']; ?></td>
		  <td><?php echo $user['User']['role']; ?></td>
		  <td class='actions'>
		  <?php
		  echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id']));
		  echo $this->Form->postLink('Deletar', array('action' => 'delete', $user['User']['id']), array('confirm' => 'Você tem certeza que quer excluir este usuário?'));
		  ?>
		  </td>
	   </tr>
	<?php } ?>
	</table>
</div>
</div>
