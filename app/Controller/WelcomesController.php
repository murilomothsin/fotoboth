<?php

class WelcomesController extends AppController {

	var $name = 'Welcome';

	var $helpers = array('Html', 'Form');

	public $uses = 'Album';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('loja', 'book', 'eventos', 'externas', 'videos', 'contato');
	}

	public function index() {
		$this->set('albums', $this->Album->find('all'));
	}

	public function loja() {
		$this->set('nomes', 'murilo');
	}

	public function book() {
		$this->set('albums', $this->Album->find('all'));
	}

	public function eventos() {
		$this->set('nomes', 'murilo');
	}

	public function externas() {
		$this->set('nomes', 'murilo');
	}

	public function videos() {
		$this->set('nomes', 'murilo');
	}

	public function contato() {
		$this->set('nomes', 'murilo');
	}
}


?>