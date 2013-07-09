<?php

	class Album extends AppModel {

		public $userTable = 'albums';

		public $name = 'Album';

		//public $belongsTo = 'Categoria';

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

	}

?>