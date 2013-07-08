<div>
   <?php echo $this->Form->create('User'); ?>
   <fieldset>
      <legend>Adicionar</legend>
      <?php
         echo $this->Form->input('name');
         echo $this->Form->input('username');
         echo $this->Form->input('password');
         echo $this->Form->input('email');
         echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
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
