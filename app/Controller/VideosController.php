<?php

class VideosController extends AppController {

	var $name = 'Videos';
	var $helpers = array('Html', 'Form');

	public function admin_index() {
		$this->set('videos', $this->Video->find('all'));
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
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possivel editar o video.'));
			}
		}else {
			$this->request->data = $this->Video->read(null, $id);
		}
	}

	public function admin_add() {
		if (!empty($this->request->data)) {
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('Video adicionado com sucesso.', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Erro ao adicionar o video.', true));
			}
		}
	}
}


?>