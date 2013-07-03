<div>
   <?php echo $this->Form->create('User', array('action' => 'edit')); ?>
   <fieldset>
      <legend>Editar</legend>
      <?php
         echo $this->Form->input('name');
         echo $this->Form->input('username');
         echo $this->Form->input('password');
         echo $this->Form->input('email');
         echo $this->Form->input('group_id');
         echo $this->Form->input('id', array('type' => 'hidden'));
      ?>
   </fieldset>
   <?php echo $this->Form->end('ENVIAR'); ?>
</div>
<div>
   <h3>Actions</h3>
   <ul>
      <li><?php echo $this->Html->link('Listar', array('action' => 'index')); ?></li>
   </ul>
</div>