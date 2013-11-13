<?php
App::uses('AppModel', 'Model');
/**
 * Subject Model
 *
 * @property Grade $Grade
 */
class Subject extends AppModel {

/**
 * Display Field
 *
 * @var string
 */
 	public $displayField = 'description';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Insira a descrição',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Grade' => array(
			'className' => 'Grade',
			'foreignKey' => 'subject_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * beforeSave method
 *
 * @return boolean
 * @access public
 */
	public function beforeSave($options = array()) {
		parent::beforeSave($options);
		
		if (isset($this->data[$this->name]['name'])) {
			$this->data[$this->name]['name'] = $this->clearSpaces($this->data[$this->name]['name']);
		}
		
		return true;
	}

}
