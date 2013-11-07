<?php
App::uses('AppModel', 'Model');
/**
 * BatchGrade Model
 *
 * @property Subject $Subject
 * @property Batch $Batch
 * @property Period $Period
 */
class BatchGrade extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'subject_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'batch_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'period_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'created_user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'modified_user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
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
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
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
		),
		'Period' => array(
			'className' => 'Period',
			'foreignKey' => 'period_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
/**
 * calculateGrade method
 *
 * @return boolean
 * @access public
 */
	public function calculateGrade($batch_id, $period_id) {
		
		$this->deleteAll(array(
			'BatchGrade.batch_id' => $batch_id,
			'BatchGrade.period_id' => $period_id 
		));
		
		App::uses('Grade', 'Model');
		
		$Grades = new Grade();
		
		$conditions = array('Grade.batch_id' => $batch_id,'Grade.period_id' => $period_id);
		$fields = array('Grade.subject_id');
		$group = $fields;
		$contain = array();
		
		$fields[] = '(AVG(Grade.grade)) as Grade__grade';
		$fields[] = '(AVG(Grade.cumulative_avg)) as Grade__cumulative_avg';
		$fields[] = 'COUNT(1) as Grade__students_number';
		$Grades->virtualFields['grade'] = 0;
		$Grades->virtualFields['cumulative_avg'] = 0;
		$Grades->virtualFields['students_number'] = 0;
		
		$grades = $Grades->find('all', compact('conditions', 'fields', 'group', 'contain'));
		
		$ok = true;
		foreach ($grades as $grade) {
			$batchGrade = array(
				'BatchGrade' => array(
					'subject_id' => $grade['Grade']['subject_id'],
					'batch_id' => $batch_id,
					'period_id' => $period_id,
					'grade' => $grade['Grade']['grade'],
					'cumulative_avg' => $grade['Grade']['cumulative_avg'],
					'students_number' => $grade['Grade']['students_number']
				)
			);
			$this->create();
			$ok = $ok && $this->save($batchGrade);
		}
		
		return $ok;
	}
}
