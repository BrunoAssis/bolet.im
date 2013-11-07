<?php
App::uses('AppModel', 'Model');
/**
 * SchoolGrade Model
 *
 * @property Subject $Subject
 * @property School $School
 * @property Period $Period
 */
class SchoolGrade extends AppModel {

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
		'school_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
		'School' => array(
			'className' => 'School',
			'foreignKey' => 'school_id',
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
	public function calculateGrade($school_id, $period_id) {
		
		$this->deleteAll(array(
			'SchoolGrade.school_id' => $school_id,
			'SchoolGrade.period_id' => $period_id 
		));
		
		App::uses('BatchGrade', 'Model');
		App::uses('Batch', 'Model');
		
		$BatchGrade = new BatchGrade();
		$Batch = new Batch();
		
		
		$contain = array();
		$conditions = array('Batch.school_id' => $school_id);
		$batches = $Batch->find('all', compact('contain', 'conditions'));
		$ok = true;
		foreach ($batches as $batch) {
			if ($BatchGrade->calculateGrade($batch['Batch']['id'], $period_id)) {
				$ok = $ok && true;
			} else {
				return false;
			}
		}
		
		if ($ok) {
			$conditions = array('Batch.school_id' => $school_id, 'BatchGrade.period_id' => $period_id);
			$joins = array(
				array('table' => 'batches', 'alias' => 'Batch', 'conditions' => array('Batch.id = BatchGrade.batch_id'))
			);
			$fields = array('BatchGrade.subject_id');
			$group = $fields;
			$contain = array();
			
			$fields[] = '(AVG(BatchGrade.grade)) as BatchGrade__grade';
			$fields[] = '(AVG(BatchGrade.cumulative_avg)) as BatchGrade__cumulative_avg';
			$fields[] = 'SUM(BatchGrade.students_number) as BatchGrade__students_number';
			$BatchGrade->virtualFields['grade'] = 0;
			$BatchGrade->virtualFields['cumulative_avg'] = 0;
			$BatchGrade->virtualFields['students_number'] = 0;
			
			$batchGrades = $BatchGrade->find('all', compact('conditions', 'joins','fields', 'group', 'contain'));
			
			foreach ($batchGrades as $batchGrade) {
				$schoolGrade = array(
					'SchoolGrade' => array(
						'subject_id' => $batchGrade['BatchGrade']['subject_id'],
						'school_id' => $school_id ,
						'period_id' => $period_id,
						'grade' => $batchGrade['BatchGrade']['grade'],
						'cumulative_avg' => $batchGrade['BatchGrade']['cumulative_avg'],
						'students_number' => $batchGrade['BatchGrade']['students_number']
					)
				);
				$this->create();
				$ok = $ok && $this->save($schoolGrade);
			}
		}
		
		if ($ok) {
			App::uses('Grade', 'Model');
			$Grade = new Grade();
			$ok = $Grade->rankGrades($school_id, $period_id);
		}
		
		return $ok;
	}
}
