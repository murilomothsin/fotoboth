<?php

	class User extends AppModel {

		public $userTable = 'users';

		//public $belongsTo = 'Categoria';

		public $validate = array(
		  'username' => array(
				'required' => array(
					 'rule' => array('notEmpty'),
					 'message' => 'Digite um usuário!'
				)
		  ),
		  'password' => array(
				'required' => array(
					 'rule' => array('notEmpty'),
					 'message' => 'Digite uma senha!'
				)
		  ),
		  'role' => array(
				'valid' => array(
					 'rule' => array('inList', array('admin', 'author')),
					 'message' => 'Selecione um direito!',
					 'allowEmpty' => false
				)
		  )
		);

	}

?>