<?php

	class User extends AppModel {

		public $userTable = 'users';

		//public $belongsTo = 'Categoria';

		public $belongsTo = array(
			'Group' => array(
				'className' => 'Group',
				'foreignKey' => 'group_id',
				'conditions' => array(),
				'fields' => array('Group.id', 'Group.group'),
				'counterCache' => 'true',
				'counterScope' => array(),
				'order' => array('Group.group' => 'ASC')
			)
		);

		public $validate = array(
		  'username' => array(
				'required' => array(
					 'rule' => array('notEmpty'),
					 'message' => 'A username is required'
				)
		  ),
		  'password' => array(
				'required' => array(
					 'rule' => array('notEmpty'),
					 'message' => 'A password is required'
				)
		  ),
		  'role' => array(
				'valid' => array(
					 'rule' => array('inList', array('admin', 'author')),
					 'message' => 'Please enter a valid role',
					 'allowEmpty' => false
				)
		  )
		);

	}

?>