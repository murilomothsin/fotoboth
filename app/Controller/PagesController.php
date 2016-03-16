<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

	public $name = 'Pages';
	var $helpers = array('Html', 'Form');
	public $uses = array('Pages');

	public function admin_index() {
		$this->Pages->recursive = 0;
		$options = array(
			'order' => array('Pages.when' => 'DESC'),
			'limit' => 10
		);
		$this->paginate = $options;
		$this->set('pages', $this->paginate());
	}


	public function admin_add(){

		if (!empty($this->request->data)) {
			if ($this->Pages->save($this->request->data)) {
				$this->Session->setFlash(__('Página adicionado com sucesso.', true));
			} else {
				$this->Session->setFlash(__('Erro ao adicionar o página.', true));
			}
			$this->redirect(array('action'=>'index'));
		}
	}

}
