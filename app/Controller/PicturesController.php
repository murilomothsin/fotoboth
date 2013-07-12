<?php

class PicturesController extends AppController {

	var $name = 'Pictures';
	var $helpers = array('Html', 'Form');
	

	public function index() {
		$this->set('pictures', $this->Picture->find('all'));
	}


	function add() {
		if (!empty($this->request->data)) {
			//$this->request->data['Picture'] = $this->Picture->uploadImg($this->request->data['Picture']);
			//$this->data['Picture']['type'] = $this->data['Picture']['Picture']['type'];
			if ($this->Picture->save($this->request->data)) { //salva o trabalho
				$this->Session->setFlash(__('Arquivo enviado com sucesso.', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Desculpe. O trabalho não pode ser salvo. Tente novamente.', true));
			}
		} //fecha if - formulario enviado
	}
}


?>