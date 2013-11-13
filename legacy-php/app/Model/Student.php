<?php
App::uses('AppModel', 'Model');
/**
 * Student Model
 *
 * @property User $User
 * @property School $School
 * @property Batch $Batch
 * @property Grade $Grade
 */
class Student extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		/*'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),*/
		'school_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione uma escola',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'batch_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione uma turma',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Insira o nome',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birthdate' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Informe a data de nascimento',
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'School' => array(
			'className' => 'School',
			'foreignKey' => 'school_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Batch' => array(
			'className' => 'Batch',
			'foreignKey' => 'batch_id',
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
			'foreignKey' => 'student_id',
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

/**
 * ofUser method
 *
 * @return array
 * @access public
 */
	public function ofUser($user_id) {
		$conditions = array('Student.user_id' => $user_id, 'Year.year' => date('Y'));
		return $this->_studentData($conditions);
	}
	
/**
 * ofId method
 *
 * @return array
 * @access public
 */
	public function ofId($id) {
		$conditions = array('Student.id' => $id, 'Year.year' => date('Y'));
		return $this->_studentData($conditions);
	}

/**
 * _studentData method
 *
 * @return array
 * @access protected
 */
	protected function _studentData($conditions) {
		$contain = array();
		$conditions = $conditions;
		$fields = array(
			'Student.id', 'Student.name', 'Student.birthdate', 'Student.students_registry', 'Student.batch_id', 'Student.school_id',
			'School.id', 'School.name',
			'Batch.id', 'Batch.description',
			'Course.id', 'Course.level', 'Course.description', 'Course.abbr',
			'Year.id', 'Year.year'
		);
		$joins = array(
			array('table' => 'schools', 'alias' => 'School', 'conditions' => array('School.id = Student.school_id')),
			array('table' => 'batches', 'alias' => 'Batch', 'conditions' => array('Batch.id = Student.batch_id')),
			array('table' => 'courses', 'alias' => 'Course', 'conditions' => array('Course.id = Batch.course_id')),
			array('table' => 'years', 'alias' => 'Year', 'conditions' => array('Year.id = Batch.year_id'))
		);
		
		return $this->find('first', compact('contain', 'conditions', 'fields', 'joins'));
	}
	
/**
 * warnings method
 *
 * @return array
 * @access public
 */
	public function warnings($data) {
		debug($data);
		die();
	}
}
