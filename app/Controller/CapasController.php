<?php

class CapasController extends AppController {

	var $name = 'Capa';

	var $helpers = array('Html', 'Form');

	public $uses = array('Album', 'Video', 'Picture');

	public function admin_index() {
		$this->set('pictures', $this->Picture->find('all', array(
		'conditions' => array('capa' => '1'))));
	}

	public function admin_add() {
		if (!empty($this->request->data)) {
			$this->request->data['Picture'] = $this->Upload->uploadImg($this->request->data['Picture'], 'img/capa');
			$this->request->data['Picture']['capa'] = 1;
			if ($this->Picture->save($this->request->data)) {
				$this->Session->setFlash(__('Arquivo enviado com sucesso.', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Desculpe. O trabalho não pode ser salvo. Tente novamente.', true));
			}
		}
	}

}
