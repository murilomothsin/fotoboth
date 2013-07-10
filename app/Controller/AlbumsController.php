<?php

class AlbumsController extends AppController {

	var $name = 'Albums';
	var $helpers = array('Html', 'Form');

	public function index() {
		$this->set('albums', $this->Album->find('all'));
	}

	public function add(){
		
		$categories = $this->Album->Category->find('list');
		$this->set(compact('categories'));

		if($this->request->is('post')){
			if($this->Album->save($this->request->data)){
				$this->Session->setFlash("Album foi adicionado com sucesso!");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Falha na inserção do album, tente outra vez.');
			}
			
		}
	}
}
?>