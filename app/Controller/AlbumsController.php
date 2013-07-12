<?php

// App::import('Controller', 'Pictures');

// $Pictures = new PicturesController;

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
			$this->Album->create();
			//var_dump($this->request->data['Picture']);
			//$newPicture = $this->Album->Picture->uploadImg($this->request->data['Picture']);
			//$newPicture = $this->requestAction(array('controller'=>'Pictures', 'action'=>'uploadImg'), array('params' => $this->request->data['Picture']));
			//pr($newPicture);
			array_merge($this->request->data['Picture'], $newPicture);
			//$this->Album->Picture->uploadImg();
			//pr($this->request->data);
			//die();
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