<?php

	class Picture extends AppModel {

		public $userTable = 'pictures';

		public $name = 'Picture';

		public $belongsTo = 'Album';

		function beforeSave() {
			App::import('Component','Upload');
			App::import('Component','Session');
			$upload = new UploadComponent();
			$Session = new SessionComponent();
			//$this->data['geocoded'] = $gc->geocode($this->data['address']);
			//return true;

			if(empty($this->request->data['Picture']['Img'])) {
				$this->Session->setFlash(__('É preciso enviar uma imagem',true));
				return false;
			}
			$path = "img/pictures";
			$this->Upload->setPath($path);
			$this->Upload->addAllowedExt($this->request->data['Picture']['Img']['type']);
			$novo_picture = $this->Upload->copyUploadedFile($this->request->data['Picture']['Img'], '');
			//pr($novo_picture);
			//pr($this->Upload->getLog());
			//grava dados do arquivo no banco de dados
			$this->request->data['Picture']['dir'] = 'files';
			$this->request->data['Picture']['picture_path'] = $novo_picture;
			$this->request->data['Picture']['file_size'] = number_format($this->request->data['Picture']['Img']['size']/1024, 2) . " KB";

			return true;
		}
		/*
		function uploadImg($PostPicture) {
			echo 'oioioi';
			var_dump($PostPicture);
			if(empty($PostPicture['Img'])) {
				$this->Session->setFlash(__('É preciso enviar uma imagem',true));
				return false;
			}
			$path = "img/pictures";
			$this->Upload->setPath($path);
			var_dump($this->request->data['Picture']['Img']);
			$this->Upload->addAllowedExt($PostPicture['Img']['type']);
			$novo_picture = $this->Upload->copyUploadedFile($PostPicture['Img'], '');
			pr($novo_picture);
			pr($this->Upload->getLog());
			//grava dados do arquivo no banco de dados
			$PostPicture['dir'] = 'files';
			$PostPicture['picture_path'] = $novo_picture;
			$PostPicture['file_size'] = number_format($PostPicture['Img']['size']/1024, 2) . " KB";

			return $PostPicture;
		} */

	}

?>