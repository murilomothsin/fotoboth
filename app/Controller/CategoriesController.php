<?php

class CategoriesController extends AppController {

	var $name = 'Categories';
	var $helpers = array('Html', 'Form');

	public function index() {
		$this->set('categories', $this->Category->find('all'));
	}


	function add() {
		if (!empty($this->request->data)) {
			if ($this->Category->save($this->request->data)) { //salva o trabalho
				$this->Session->setFlash(__('Categoria criada com sucesso.', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Desculpe. O trabalho não pode ser salvo. Tente novamente.', true));
			}
		} //fecha if - formulario enviado
	}
}


?>