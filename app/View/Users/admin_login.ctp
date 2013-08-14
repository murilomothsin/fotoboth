<div class="users form" align="center">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
		<?php 
			echo $this->Form->input('username', array( 'placeholder' => 'Usuário'));
			echo $this->Form->input('password', array( 'type' => 'password', 
														'placeholder' => 'Senha'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Login'));?>
</div>