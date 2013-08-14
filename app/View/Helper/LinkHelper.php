<?php
	App::uses('AppHelper', 'View/Helper');

	class LinkHelper extends AppHelper {
		
		public $helpers = array('Html');
		
		public function makeLink() {
		
		$link = '<hr>
			<div>
				<ul class="nav nav-pills">
					<li>'.$this->Html->link('Adicionar', array('controller' => 'users', 'action' => 'add')).'</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Albums<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>'.$this->Html->link('Lista', array('controller' => 'albums', 'action' => 'index')).'</li>
							<li>'.$this->Html->link('Adicionar', array('controller' => 'albums', 'action' => 'add')).'</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuários<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>'.$this->Html->link('Lista', array('controller' => 'users', 'action' => 'index')).'</li>
							<li>'.$this->Html->link('Adicionar', array('controller' => 'users', 'action' => 'add')).'</li>
						</ul>
					</li>
					<li>'.$this->Html->link('Pictures', array('controller' => 'pictures', 'action' => 'index')).'</li>
					<li>'.$this->Html->link('Adicionar', array('action' => 'add')).'</li>
					<li>'.$this->Html->link('Sair', array('controller' => 'users', 'action' => 'logout')).'</li>
				</ul>
			</div>
		<hr>';

		return  $link;
		}
	}
?>