<?php

class PicturesController extends AppController {

	var $name = 'Pictures';

	var $helpers = array('Html', 'Form');

	var $components = array('Upload');
	

	public function admin_index() {
		$this->set('pictures', $this->Picture->find('all'));
	}


	function admin_add() {
		if (!empty($this->request->data)) {
			$this->request->data['Picture'] = $this->Upload->uploadImg($this->request->data['Picture']);
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