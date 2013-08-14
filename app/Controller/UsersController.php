<?php

   class UsersController extends AppController {
	  public $helpers = array ('Html','Form');
	  public $uses = 'User';
	  public $name = 'Users';
	  public $components = array('Session');

		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('add', 'logout');
		}

		public function admin_login() {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}

		public function admin_logout() {
			$this->redirect($this->Auth->logout());
		}

		public function admin_index(){
			//$this->set('users', $this->User->find('all'));
			$this->User->recursive = 0;
			$this->set('users', $this->paginate());
		}

		public function admin_view($id = null) {
			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid user'));
			}
			$this->set('user', $this->User->read(null, $id));
		}

		public function admin_add(){
			if($this->request->is('post')){
				$this->User->create();
				if($this->User->save($this->request->data)){
					$this->Session->setFlash("Usuário foi adicionado com sucesso!");
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Falha na inserção do usuário, tente outra vez.');
				}
			}
		}

		public function admin_edit($id = null){
			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Usuário inválido!'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Usuário foi editado com sucesso.'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Não foi possivel editar o usuário.'));
				}
			} else {
				$this->request->data = $this->User->read(null, $id);
				unset($this->request->data['User']['password']);
			}
		}

		public function admin_delete($id = null) {
			if (!$this->request->is('post')) {
				throw new MethodNotAllowedException();
			}
			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Usuário inválido.'));
			}
			if ($this->User->delete()) {
				$this->Session->setFlash(__('Usuário removido.'));
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Erro ao remover usuário.'));
			$this->redirect(array('action' => 'index'));
		}

   }

?>