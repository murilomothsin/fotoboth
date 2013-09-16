<?php

App::uses('CakeEmail', 'Network/Email');

class WelcomesController extends AppController {

	var $name = 'Welcome';

	var $helpers = array('Html', 'Form');

	public $uses = array('Album', 'Video', 'Picture');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('loja', 'book', 'eventos', 'externas', 'videos', 'contato', 'ajax');
	}

	public function index() {
		$this->set('images', $this->Picture->find('all', array(
		'conditions' => array('capa' => '1'))));
	}

	public function loja() {
		$this->set('nomes', 'murilo');
	}

	public function book() {
		$this->set('albums', $this->Album->find('all', array(
		'conditions' => array('category_id' => '1'))));
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
		$this->set('albums', $this->Album->find('all', array(
		'conditions' => array('category_id' => '2'))));
	}

	public function externas() {
		$this->set('albums', $this->Album->find('all', array(
		'conditions' => array('category_id' => '3'))));
	}

	public function videos() {
		$this->set('videos', $this->Video->find('all'));
	}

	public function contato() {
		if ($this->request->data) {
			$email = '<span style="border: 1px solid #CCC;width: 400px; padding: 10px; display: inline-block"><h3>Mensagem enviada pelo site</h3><hr>
<b>Nome: </b>'.$this->request->data['Email']['nome'].'<br />
<b>Telefone: </b>'.$this->request->data['Email']['telefone'].'<br />
<b>E-mail: </b>'.$this->request->data['Email']['email'].'<br />
<b>Endereço: </b>'.$this->request->data['Email']['endereco'].'<br />
<b>Evento: </b>'.$this->request->data['Email']['evento'].'<br />
<b>Mensagem: </b><p>'.nl2br($this->request->data['Email']['Mensagem']).'</p><br />
			';
			$Email = new CakeEmail();
			$Email->config('gmail');
			$Email->from(array('me@example.com' => 'My Site'))
				->emailFormat('html')
				->to('murilo.mothsin@gmail.com')
				->subject('About')
				->send($email);
			$this->Session->setFlash(__('E-mail enviado com sucesso'));
			$this->redirect(array('action' => 'contato'));
		}
	}
}


?>