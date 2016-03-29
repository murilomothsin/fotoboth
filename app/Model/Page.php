<?php

	class Page extends AppModel {

		public $userTable = 'pages';

		public $name = 'Page';

		public $validate = array(
		  'title' => array(
				'required' => array(
					 'rule' => array('notEmpty'),
					 'message' => 'Digite um titulo para a página!'
				)
		  ),
		  'url' => array(
				'required' => array(
					 'rule' => array('notEmpty'),
					 'message' => 'Digite a URL!'
				),
				'format' => array(
					'rule' => "/^[a-z0-9-_]{3,}$/i",
        			'message' => 'Use apenas letras, números e - na URL'
				),
				'maxLength' => array(
					'rule' => array('lengthBetween', 3, 15),
        			'message' => 'Tamanho máximo de 3 à 15 caracteres.'
				),
				'isunique' => array(
			        'rule' => 'isUnique',
			        'message' => 'URL já cadastrada.'
			    )
		  )
		);

		public function notInList($check){
			$list=array('contato', 'home', 'loja', 'book', 'admin', 'eventos', 'externas', 'videos', 'admin/albums');
			return !in_array($check, $list);
		}

	}

?>