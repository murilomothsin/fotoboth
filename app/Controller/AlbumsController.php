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
			pr($this->request->data);
			//die();
			//vai para o diretorio TEMPORARIO
			echo chdir('files/uploadify/temp');

			$targetPath = AuthComponent::user('username').$this->request->data['timeInit'];
			$pathToCopy =  realpath('../../../img/pictures');
			$pathToCopy .= '/'.$this->request->data['timeInit'].'/';
			if( is_dir($targetPath) ){
				$files1 = scandir($targetPath);
				unset($files1[0]);
				unset($files1[1]);
				sort($files1);

				mkdir($pathToCopy);
				//$this->request->data['Picture'] = array();

				foreach ($files1 as $key => $value) {
					rename($targetPath.'/'.$value, $pathToCopy.$value);
					$file_size = filesize($pathToCopy.$value);
					$this->request->data['Picture'][$key]['picture_path'] = $value;
					$this->request->data['Picture'][$key]['dir'] = $this->request->data['timeInit'];
					$this->request->data['Picture'][$key]['file_size'] = number_format($file_size/1024, 2) . " KB";
				}
				rmdir($targetPath);
			}

			if( !is_dir($pathToCopy) )
				mkdir($pathToCopy);
			rename($this->request->data['Picture']['0']['Img']['tmp_name'], $pathToCopy.$this->request->data['Picture']['0']['Img']['name']);
			$this->request->data['Picture']['0']['picture_path'] = $this->request->data['Picture']['0']['Img']['name'];
			$this->request->data['Picture']['0']['dir'] = $this->request->data['timeInit'];
			$this->request->data['Picture']['0']['file_size'] = number_format($this->request->data['Picture']['0']['Img']['size']/1024, 2) . " KB";


			$this->Album->create();
			$this->request->data['Album']['user_id'] = $this->Auth->user('id');
			if($this->Album->saveAll($this->request->data)){
				$this->Session->setFlash("Album foi adicionado com sucesso!");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Falha na inserção do album, tente outra vez.');
			}
		}
	}

	function admin_delete($id = null) {
		$this->Album->id = $id;

		$options['conditions'] = array(
		    'Picture.album_id' => $id
		);
		$options['limit'] = '1';

		$pics = $this->Album->Picture->find('all', $options);

		foreach ($pics as $key => $value) {
			$targetPath = 'img/pictures/'.$value['Picture']['dir'];
			if( is_dir($targetPath) ){
				$files1 = scandir($targetPath);
				unset($files1[0]);
				unset($files1[1]);
				sort($files1);
				foreach ($files1 as $k => $v) {
					echo unlink($targetPath.'/'.$v);
				}
				echo rmdir($targetPath);
			}
		}

		if($this->Album->delete()){
			$this->Session->setFlash("Album foi excluido com sucesso!");
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("Erro ao excluir album!");
		$this->redirect(array('action' => 'index'));
	}

	function admin_edit($id = null) {
		$this->Album->id = $id;
		$categories = $this->Album->Category->find('list');
		$this->set(compact('categories'));

		//$pics = $this->Album->Picture->find('');
		if ($this->request->is('get')) {
			$this->request->data = $this->Album->read();
		} else {
			//$this->Album->create();
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