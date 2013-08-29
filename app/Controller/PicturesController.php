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
		}
	}

	function admin_delete($id = null) {
		$this->Picture->id = $id;
		$options['conditions'] = array(
		    'Picture.id' => $id
		);
		$options['limit'] = '1';

		$pics = $this->Picture->find('all', $options);
		foreach ($pics as $key => $value) {
			//pr($value);
			//echo getcwd();
			$targetPath = 'img/pictures/'.$value['Picture']['dir'];
			if( is_dir($targetPath) ){
				$files1 = scandir($targetPath);
				unset($files1[0]);
				unset($files1[1]);
				sort($files1);
				//echo $targetPath.'/'.$value['Picture']['picture_path'];
				unlink($targetPath.'/'.$value['Picture']['picture_path']);
				$filesInDir = count($files1);
				if($filesInDir == 0){
					rmdir($targetPath);
				}
			}
		}
		//die();
		if($this->Picture->delete()){
			$this->Session->setFlash("Imagem foi excluido com sucesso!");
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("Erro ao excluir imagem!");
		$this->redirect(array('action' => 'index'));
	}
}


?>