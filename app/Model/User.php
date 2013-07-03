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

	}

?>