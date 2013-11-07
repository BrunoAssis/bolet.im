<?php
App::uses('AppModel', 'Model');
/**
 * Period Model
 *
 * @property Grade $Grade
 */
class Period extends AppModel {

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
		'order' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Informe a ordem do período',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Insira uma descrição',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'abbr' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Insira uma abreviação',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'year_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione um ano',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'start_date' => array(
			'notempty' => array(
				'rule' => array('date'),
				'message' => 'Digite uma data válida',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'end_date' => array(
			'notempty' => array(
				'rule' => array('date'),
				'message' => 'Digite uma data válida',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Year' => array(
			'className' => 'Year',
			'foreignKey' => 'year_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Grade' => array(
			'className' => 'Grade',
			'foreignKey' => 'period_id',
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
	public function current() {
		$contain = array();
		$order = array('Period.start_date desc');
		$conditions = array('Period.start_date <= now()');
		$fields = array(
			'id',
			'description',
			'year_id',
			'start_date',
			'end_date'
		);
		return $this->find('first', compact('contain', 'order', 'conditions', 'fields'));
	}
	
/**
 * ofYear method
 *
 * @return array
 * @access public
 */
	public function ofYear($year_id) {
		$contain = array();
		$order = array('Period.start_date asc');
		$conditions = array('Period.year_id' => $year_id);
		$fields = array('Period.id', 'Period.desctiption');
		return $this->find('all', compact('contain', 'order', 'conditions'));
	}

}
