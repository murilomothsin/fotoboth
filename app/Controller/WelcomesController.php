<?php

class WelcomesController extends AppController {

	var $name = 'Welcome';

	var $helpers = array('Html', 'Form');

	public $uses = array('Album', 'Video');

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
		$this->set('albums', $this->Album->find('all', array(
		'conditions' => array('category_id' => '1'))));
	}

	public function ajax($id = null){
		if(strlen($id) == 13)
			$id = '0'.$id;
		$targetPath =  'img/pictures/'.$id;
		$files1 = scandir($targetPath);
		$targetPath .= '/';
		unset($files1[0]);
		unset($files1[1]);
		sort($files1);
		$this->layout = "ajax";
		$this->set("path",$targetPath);
		$this->set("imageList",$files1);
	}

	public function eventos() {
		$this->set('nomes', 'murilo');
	}

	public function externas() {
		$this->set('nomes', 'murilo');
	}

	public function videos() {
		$this->set('videos', $this->Video->find('all'));
	}

	public function contato() {
		$this->set('nomes', 'murilo');
	}
}


?>