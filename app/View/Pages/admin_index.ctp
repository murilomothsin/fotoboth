<?php  $helpers = array('Link'); ?>
<div class="row">
	<?php echo $this->Link->makeLink(); ?>

	<div class="large-12 columns">
		<legend><?php echo __('Páginas'); ?></legend>
	</div>
</div>
<div class="row">
	<div class="large-12 columns">
		<table class="table table-hover table-condensed table-bordered">
			<thead>
				<tr>
					<th style="width: 3%;">Id</th>
					<th style="width: 25%;">Titulo</th>
					<th style="width: 15%;">Conteúdo</th>
					<th style="width: 8%;">URL</th>
					<th style="width: 4%;">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($pages as $page) {
				?>
				<tr>
					<td><?php echo $page['Pages']['id']; ?></td>
					<td><?php echo $page['Pages']['title']; ?></td>
					<td><?php echo $page['Pages']['content']; ?></td>
					<td><?php echo $page['Pages']['url']; ?></td>
					<td>
					<?php
						echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $page['Pages']['id']), array('escape' => false, 'style' => 'padding: 3px'));
						echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $page['Pages']['id']), array('confirm' => 'Você tem certeza que quer excluir estea página?',
						'escape' => false, 'style' => 'padding: 3px'));
					?>
					</td>
				</tr>
				<?php } ?>
		</tbody>
		</table>
	</div>
	<div class="pagination pagination-centered">
		<ul>
		<?php
			if($this->Paginator->hasPrev())
				echo $this->Paginator->prev('<<', array('tag' => 'li', 'class' => 'disabled'));
			if($this->Paginator->hasPage())
				echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'currentTag' => 'a', 'currentClass' => 'disabled'));
			if($this->Paginator->hasNext())
				echo $this->Paginator->next('>>', array('tag' => 'li', 'class' => 'disabled'));
		?>
		</ul>
	</div>
</div>