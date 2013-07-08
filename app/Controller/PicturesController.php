<?php

class PicturesController extends AppController {

	var $name = 'Pictures';
	var $helpers = array('Html', 'Form');
	var $components = array('Upload');

	public function index() {
		$this->set('pictures', $this->Picture->find('all'));
	}


	function add() {
		if (!empty($this->request->data)) {
			pr($this->request->data);
			if(empty($this->request->data['Picture']['Img'])) {
				$this->Session->setFlash(__('É preciso enviar o arquivo referente ao trabalho',true));
				return false;
			}
			$path = "img/pictures";
			$this->Upload->setPath($path);
			var_dump($this->request->data['Picture']['Img']);
			$this->Upload->addAllowedExt($this->request->data['Picture']['Img']['type']);
			$novo_picture = $this->Upload->copyUploadedFile($this->request->data['Picture']['Img'], '');
			pr($novo_picture);
			pr($this->Upload->getLog());
			//grava dados do arquivo no banco de dados
			$this->request->data['Picture']['dir'] = 'files';
			$this->request->data['Picture']['picture_path'] = $novo_picture;
			$this->request->data['Picture']['file_size'] = number_format($this->data['Picture']['Img']['size']/1024, 2) . " KB";
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