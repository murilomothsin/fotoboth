<?php

	class Album extends AppModel {

		public $userTable = 'albums';

		public $name = 'Album';

		public $hasMany = array('Picture' => array(
								'className' => 'Picture',
								'dependent'=> true,));

		//public $belongsTo = 'Category';
		public $belongsTo = array(
				'Category' => array(
				'className' => 'Category',
				'foreignKey' => 'category_id',
				'conditions' => array(),
				'fields' => array('Category.id', 'Category.category'),
				'counterCache' => 'true',
				'counterScope' => array(),
				'order' => array('Category.category' => 'ASC')
			)
		);


		public $validate = array(
		  'title' => array(
				'required' => array(
					 'rule' => array('notEmpty'),
					 'message' => 'Digite um titulo para o album!'
				)
		  ),
		  'model' => array(
				'required' => array(
					 'rule' => array('notEmpty'),
					 'message' => 'Digite o nome da modelo!'
				)
		  )
		);

		public function isOwnedBy($album, $user) {
			return $this->field('id', array('id' => $album, 'user_id' => $user)) === $album;
		}

	}

?>