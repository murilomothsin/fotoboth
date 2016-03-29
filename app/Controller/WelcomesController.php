<?php

App::uses('CakeEmail', 'Network/Email');

class WelcomesController extends AppController {

	var $name = 'Welcome';

	var $helpers = array('Html', 'Form');

	public $uses = array('Album', 'Video', 'Picture', 'Pages');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('loja', 'book', 'eventos', 'externas', 'videos', 'contato', 'ajax', 'pages');
	}

	public function index() {
		$this->set("title_for_layout","");
		$this->set('images', $this->Picture->find('all', array(
			'order' => 'rand()',
			'conditions' => array('capa' => '1'))));
	}

	public function loja() {
		$this->set("title_for_layout","Loja");
	}

	public function book() {
		$this->set("title_for_layout","Book");
		$this->set('albums', $this->Album->find('all', array(
		'conditions' => array('category_id' => '1'),
		'order' => array('Album.when' => 'DESC'))));
	}

	public function ajax($id = null){
		if(strlen($id) == 13)
			$id = '0'.$id;
		$targetPath =  'img/pictures/'.$id;
		$targetView = 'pictures/'.$id.'/';
		$files1 = scandir($targetPath);
		$targetPath .= '/';
		unset($files1[0]);
		unset($files1[1]);
		sort($files1);
		$this->layout = "ajax";
		$this->set("targetPath",$targetView);
		$this->set("imageList",$files1);
	}

	public function eventos() {
		$this->set("title_for_layout","Eventos");
		$this->set('albums', $this->Album->find('all', array(
		'conditions' => array('category_id' => '2'),
		'order' => array('Album.when' => 'DESC'))));
	}

	public function externas() {
		$this->set("title_for_layout","Externas");
		$this->set('albums', $this->Album->find('all', array(
		'conditions' => array('category_id' => '3'),
		'order' => array('Album.when' => 'DESC'))));
	}

	public function videos() {
		$this->set("title_for_layout","Videos");
		$this->set('videos', $this->Video->find('all', array(
			'order' => array('Video.created' => 'DESC'))));
	}

	public function pages() {
		$page = $this->Pages->find('first', array(
			'conditions' => array('url' => $this->request->url))
		);
		if(count($page) == 0){
			$this->redirect(array('action'=>'index'));
		}
		$this->set('page', $page);
		$this->set("title_for_layout","Pages");
	}

	public function contato() {
		$this->set("title_for_layout","Contato");
		if ($this->request->data) {
			$email = '<span style="border: 1px solid #CCC;width: 400px; padding: 10px; display: inline-block"><h3>Mensagem enviada pelo site</h3><hr>
<b>Nome: </b>'.$this->request->data['Email']['nome'].'<br />
<b>Telefone: </b>'.$this->request->data['Email']['telefone'].'<br />
<b>E-mail: </b>'.$this->request->data['Email']['email'].'<br />
<b>Endereço: </b>'.$this->request->data['Email']['endereco'].'<br />
<b>Assunto: </b>'.$this->request->data['Email']['evento'].'<br />
<b>Mensagem: </b><p>'.nl2br($this->request->data['Email']['Mensagem']).'</p><br />
			';
			$Email = new CakeEmail();
			$Email->config('gmail');
			$Email->from(array('me@example.com' => 'My Site'))
				->emailFormat('html')
				->to('contato@fotoboth.com.br')
				->subject('About')
				->send($email);
			$this->Session->setFlash(__('E-mail enviado com sucesso'));
			$this->redirect(array('action' => 'contato'));
		}
	}
}


?>