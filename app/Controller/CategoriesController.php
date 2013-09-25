<?php

class CategoriesController extends AppController {

	var $name = 'Categories';
	var $helpers = array('Html', 'Form');

	public function admin_index() {
		$this->set('categories', $this->Category->find('all'));
	}

	public function admin_edit( $id = null ){
		$this->Session->setFlash(__('Você não tem permissão para editar categorias.', true));
		$this->redirect(array('action'=>'index'));
	}

	public function admin_add() {
		$this->Session->setFlash(__('Você não tem permissão para adicionar categorias.', true));
		$this->redirect(array('action'=>'index'));
		if (!empty($this->request->data)) {
			if ($this->Category->save($this->request->data)) { //salva o trabalho
				$this->Session->setFlash(__('Categoria criada com sucesso.', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Desculpe. O trabalho não pode ser salvo. Tente novamente.', true));
			}
		}
	}
}


?>