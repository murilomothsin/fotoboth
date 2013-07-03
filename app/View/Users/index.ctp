<div>

<h2>Listar</h2>
<table cellpadding="0" cellspacing="0">
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
foreach ($users as $user)
{
   $class = null;
   if($i++ % 2 == 0)
   {
      $class = '';
   }

?>
   <tr <?php echo $class; ?>>
      <td><?php echo $user['User']['id']; ?></td>
      <td><?php echo $user['User']['name']; ?></td>
      <td><?php echo $user['User']['username']; ?></td>
      <td><?php echo $user['User']['email']; ?></td>
      <td><?php echo $user['Group']['group']; ?></td>
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
<div>
   <h3>Actions</h3>
   <ul>
      <li><?php echo $this->Html->link('Adicionar', array('action' => 'add')); ?></li>
   </ul>
</div>
