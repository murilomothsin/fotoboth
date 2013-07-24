<?php

class AlbumsController extends AppController {

	var $name = 'Albums';

	var $helpers = array('Html', 'Form');

	var $components = array('Upload');

	public function index() {
		$this->set('albums', $this->Album->find('all'));
	}

	public function add(){
		
		$categories = $this->Album->Category->find('list');
		$this->set(compact('categories'));

		if($this->request->is('post')){
			$this->Album->create();
			foreach ($this->request->data['Picture'] as $key => $value) {
				$this->request->data['Picture'][$key] = $this->Upload->uploadImg($this->request->data['Picture'][$key], $key);
			}
			if($this->Album->saveAll($this->request->data)){
				$this->Session->setFlash("Album foi adicionado com sucesso!");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Falha na inserção do album, tente outra vez.');
			}
		}
	}

	function edit($id = null) {
		$this->Album->id = $id;
		$categories = $this->Album->Category->find('list');
		$this->set(compact('categories'));

		//$pics = $this->Album->Picture->find('');
		if ($this->request->is('get')) {
			$this->request->data = $this->Album->read();
		} else {
			$this->Album->create();
			foreach ($this->request->data['Picture'] as $key => $value) {
				$this->request->data['Picture'][$key] = $this->Upload->uploadImg($this->request->data['Picture'][$key], $key);
			}
			if($this->Album->saveAll($this->request->data)){
				$this->Session->setFlash("Album foi adicionado com sucesso!");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Falha na inserção do album, tente outra vez.');
			}
		}
	}
}
?>