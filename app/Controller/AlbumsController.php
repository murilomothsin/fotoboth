<?php

class AlbumsController extends AppController {

	var $name = 'Albums';

	var $helpers = array('Html', 'Form');

	var $components = array('Upload');

	public function admin_index() {
		//$this->set('albums', $this->Album->find('all', array(
        //			'order' => array('Album.id' => 'asc'))));

		$this->Album->recursive = 0;
		$options = array(
			'order' => array('Album.id' => 'ASC'),
			'limit' => 10
		);
		$this->paginate = $options;
		$this->set('albums', $this->paginate());
	}

	public function admin_clearTemp(){

		echo getcwd();
		$targetPath = 'files/uploadify/temp/';
		pr($targetPath);
		$files1 = scandir($targetPath);
		unset($files1[0]);
		unset($files1[1]);
		sort($files1);
		// echo '<pre>';
		// print_r($files1);
		// echo '</pre>';
		$delete = false;
		foreach ($files1 as $key => $value) {
			$folders = scandir($targetPath.$value);
			unset($folders[0]);
			unset($folders[1]);
			sort($folders);
			foreach ($folders as $k => $v) {
				unlink($targetPath.$value.'/'.$v);
			}
			$delete = rmdir($targetPath.$value);
		}

		if($delete)
			$this->Session->setFlash('Arquivos temporarios excluidos com sucesso!');
		else
			$this->Session->setFlash('Falha ao excluir arquivos temporarios!');

		$this->redirect(array('action' => 'index'));
	}

	public function admin_add(){

		$categories = $this->Album->Category->find('list');
		$this->set(compact('categories'));

		if($this->request->is('post')){
			chdir('files/uploadify/temp');

			$targetPath = AuthComponent::user('username').$this->request->data['timeInit'];
			$pathToCopy = realpath('../../../img/pictures').'/'.$this->request->data['timeInit'].'/';
			//$pathToCopy .= '/'.$this->request->data['timeInit'].'/';
			if( is_dir($targetPath) ){
				$files1 = scandir($targetPath);
				unset($files1[0]);
				unset($files1[1]);
				sort($files1);

				mkdir($pathToCopy, 0777);
				$i = 1;
				foreach ($files1 as $key => $value) {
					rename($targetPath.'/'.$value, $pathToCopy.$value);
					chmod($pathToCopy.$value, 0777);
					$file_size = filesize($pathToCopy.$value);
					$this->request->data['Picture'][$i]['picture_path'] = $value;
					$this->request->data['Picture'][$i]['dir'] = $this->request->data['timeInit'];
					$this->request->data['Picture'][$i]['file_size'] = number_format($file_size/1024, 2) . " KB";
					$i++;
				}
				rmdir($targetPath);
			}

			if( !is_dir($pathToCopy) )
				mkdir($pathToCopy, 0777);
			if(isset($this->request->data['Picture']['0'])){
				rename($this->request->data['Picture']['0']['Img']['tmp_name'], $pathToCopy.$this->request->data['Picture']['0']['Img']['name']);
				chmod($pathToCopy.$this->request->data['Picture']['0']['Img']['name'], 0777);
				$this->request->data['Picture']['0']['picture_path'] = $this->request->data['Picture']['0']['Img']['name'];
				$this->request->data['Picture']['0']['dir'] = $this->request->data['timeInit'];
				$this->request->data['Picture']['0']['file_size'] = number_format($this->request->data['Picture']['0']['Img']['size']/1024, 2) . " KB";
			}

			$this->Album->create();
			$this->request->data['Album']['user_id'] = $this->Auth->user('id');
			if($this->Album->saveAll($this->request->data)){
				$this->Session->setFlash("Album foi adicionado com sucesso!");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Falha na inserção do album, tente outra vez.');
				$this->redirect(array('action' => 'index'));
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

		if($this->request->is('post') || $this->request->is('put')) {
			if($this->Album->save($this->request->data)){
				$this->Session->setFlash("Album foi editado com sucesso!");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Falha na edição do album, tente outra vez.');
			}
		}else{
			$this->request->data = $this->Album->read();
		}
	}
}

?>