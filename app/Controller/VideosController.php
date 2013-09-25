<?php

class VideosController extends AppController {

	var $name = 'Videos';
	var $helpers = array('Html', 'Form');

	public function admin_index() {
		//$this->set('videos', $this->Video->find('all'));
		$this->Video->recursive = 0;
		$options = array(
			'order' => array('Video.id' => 'ASC'),
			'limit' => 10
		);
		$this->paginate = $options;
		$this->set('videos', $this->paginate());
	}

	public function admin_edit($id = null){
		$this->Video->id = $id;
		
		if (!$this->Video->exists()) {
			$this->Session->setFlash(__('Video inválido.'));
			$this->redirect(array('action' => 'index'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('Video foi editado com sucesso.'));
			} else {
				$this->Session->setFlash(__('Não foi possivel editar o video.'));
			}
			$this->redirect(array('action' => 'index'));
		}else {
			$this->request->data = $this->Video->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Video inválido.'));
		}
		if ($this->Video->delete()) {
			$this->Session->setFlash(__('Video excluido.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Erro ao excluir video.'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_add() {
		if (!empty($this->request->data)) {
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('Video adicionado com sucesso.', true));
			} else {
				$this->Session->setFlash(__('Erro ao adicionar o video.', true));
			}
			$this->redirect(array('action'=>'index'));
		}
	}
}


?>