<?php

class AlbumsController extends AppController {

	var $name = 'Albums';

	var $helpers = array('Html', 'Form');

	var $components = array('Upload');

	// public function isAuthorized($user) {
	// 	if (!parent::isAuthorized($user)) {
	// 		if ($this->action === 'add') {
	// 			// All registered users can add posts
	// 			return true;
	// 		}
	// 		if (in_array($this->action, array('edit', 'delete'))) {
	// 			$postId = $this->request->params['pass'][0];
	// 			return $this->Post->isOwnedBy($postId, $user['id']);
	// 		}
	// 	}
	// 	return false;
	// }

	public function admin_index() {
		$this->set('albums', $this->Album->find('all'));
	}

	public function admin_add(){
		
		$categories = $this->Album->Category->find('list');
		$this->set(compact('categories'));

		if($this->request->is('post')){
			$this->Album->create();
			$this->request->data['Album']['user_id'] = $this->Auth->user('id');
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

	function admin_edit($id = null) {
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