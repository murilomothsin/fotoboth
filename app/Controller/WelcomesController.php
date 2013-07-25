<?php

class WelcomesController extends AppController {

	var $name = 'Welcome';

	var $helpers = array('Html', 'Form');

	public $uses = 'Album';

	public function index() {
		$this->set('albums', $this->Album->find('all'));
	}

	public function contato() {
		$this->set('nomes', 'murilo');
	}
}


?>