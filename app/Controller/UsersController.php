<?php

   class UsersController extends AppController {
      public $helpers = array ('Html','Form');
      public $uses = 'User';
      public $name = 'Users';
      public $components = array('Session');

      public function index(){
         $this->set('users', $this->User->find('all'));
      }

      public function add(){
         if($this->request->is('post')){
            if($this->User->save($this->request->data)){
               $this->Session->setFlash("Usuário foi adicionado com sucesso!");
               $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash('Falha na inserção do usuário, tente outra vez.');
            }
         }
      }

      public function edit($id = null){
         $this->User->id = $id;
         if ($this->request->is('get')) {
            $this->request->data = $this->User->read();
         } else {
            if ($this->User->save($this->request->data)) {
               $this->Session->setFlash('Usuário foi editado com sucesso.');
               $this->redirect(array('action' => 'index'));
            }
         }
      }

   }

?>