<?php
App::uses('AppModel', 'Model');
/**
 * Grade Model
 *
 * @property Student $Student
 * @property Subject $Subject
 * @property Batch $Batch
 * @property Period $Period
 */
class Grade extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'student_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione um aluno',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'subject_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione uma disciplina',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'batch_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Seleciona uma turma',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'period_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Selecione um período',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'grade' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'Digite uma nota',
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
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
 * ofStudentInBatch method
 *
 * @return array
 */
	public function ofStudentInBatch($student, $year_id) {
		
		if (!is_array($student)) {
			$contain = array();
			$conditions = array('Student.id' => $student);
			$student = $this->Student->find('first', compact('conditions', 'contain'));
		}
		
		$contain = array();
		$conditions = array('Period.year_id' => $year_id);
		$fields = array(
			'Period.id', 'Period.description', 'Period.abbr',
			'Grade.subject_id', 'Grade.grade', 'Grade.batch_ranking', 'Grade.school_ranking',
			'Grade.cumulative_avg', 'Grade.cumulative_avg_batch_ranking', 'Grade.cumulative_avg_school_ranking',
			'BatchGrades.grade', 'BatchGrades.students_number', 'BatchGrades.cumulative_avg',
			'SchoolGrades.grade', 'SchoolGrades.students_number', 'SchoolGrades.cumulative_avg'
		);
		
		$joins = array(
			array('table' => 'grades', 'alias' => 'Grade', 'conditions' => array('Grade.period_id = Period.id', 'Grade.student_id' => $student['Student']['id'])),
			array('table' => 'batch_grades', 'alias' => 'BatchGrades', 'type' => 'LEFT',
				'conditions' => array(
					'BatchGrades.batch_id' => $student['Student']['batch_id'],
					'BatchGrades.period_id = Grade.period_id',
					'BatchGrades.subject_id = Grade.subject_id'
				)
			),
			array('table' => 'school_grades', 'alias' => 'SchoolGrades', 'type' => 'LEFT',
				'conditions' => array(
					'SchoolGrades.school_id' => $student['Student']['school_id'],
					'SchoolGrades.period_id = Grade.period_id',
					'SchoolGrades.subject_id = Grade.subject_id'
				)
			)
		);
		
		$periods = $this->Period->find('all', compact('contain', 'conditions', 'fields', 'joins'));
		$subjects = $this->Subject->find('list');
		
		$retorno = array();
		foreach ($periods as $periodKey => $period) {
			$retorno[$period['Period']['id']]['Period'] = $period['Period'];
			
			$grade = $period['Grade'];
			$subject = $subjects[$grade['subject_id']];
			
			$retorno[$period['Period']['id']]['Grade'][$grade['subject_id']] = $grade;
			$retorno[$period['Period']['id']]['Grade'][$grade['subject_id']]['Subject'] = array('description' => $subject, 'id' => $grade['subject_id']);
			$retorno[$period['Period']['id']]['Grade'][$grade['subject_id']]['batch_grade'] = $period['BatchGrades']['grade'];
			$retorno[$period['Period']['id']]['Grade'][$grade['subject_id']]['batch_students_number'] = $period['BatchGrades']['students_number'];
			$retorno[$period['Period']['id']]['Grade'][$grade['subject_id']]['school_grade'] = $period['SchoolGrades']['grade'];
			$retorno[$period['Period']['id']]['Grade'][$grade['subject_id']]['school_students_number'] = $period['SchoolGrades']['students_number'];
			
			$retorno[$period['Period']['id']]['CumulativeAvg'][$grade['subject_id']]['grade'] = $period['Grade']['cumulative_avg'];
			$retorno[$period['Period']['id']]['CumulativeAvg'][$grade['subject_id']]['batch_ranking'] = $period['Grade']['cumulative_avg_batch_ranking'];
			$retorno[$period['Period']['id']]['CumulativeAvg'][$grade['subject_id']]['school_ranking'] = $period['Grade']['cumulative_avg_school_ranking'];
			$retorno[$period['Period']['id']]['CumulativeAvg'][$grade['subject_id']]['batch_cumulative_avg'] = $period['BatchGrades']['cumulative_avg'];
			$retorno[$period['Period']['id']]['CumulativeAvg'][$grade['subject_id']]['school_cumulative_avg'] = $period['SchoolGrades']['cumulative_avg'];
		}
		
		return $retorno;
	}

/**
 * studentGrade method
 *
 * @return array
 */
	public function studentGrade($student_id, $period_id, $batch_id) {
		App::uses('Subject', 'Model');
		$Subject = new Subject();
		$contain = array();
		$conditions = array();
		$joins = array(
					array(
						'table' => 'grades', 'alias' => 'Grade',
						'conditions' => array(
							'Grade.subject_id = Subject.id',
							'Grade.student_id' => $student_id,
							'Grade.period_id' => $period_id,
							'Grade.batch_id' => $batch_id
						),
						'type' => 'LEFT'
					)
		);
		$fields = array('*');
		return $Subject->find('all', compact('contain', 'conditions', 'joins',  'fields'));
	}

/**
 * saveGrades method
 *
 * @return array
 */
	public function saveGrades($batch_id, $student_id, $data) {
		$contain = array();
		$conditions = array('Grade.student_id' => $student_id, 'Grade.batch_id' => $batch_id, 'Grade.period_id' => $data['Grade']['period_id']);
		$fields = array('Grade.id', 'Grade.subject_id', 'Grade.grade');
		$grades = $this->find('all', compact('contain', 'conditions', 'fields'));
		
		$grades = Hash::combine($grades, '{n}.Grade.subject_id', '{n}');
		
		$okSave = true;
		$okDelete = true;
		foreach ($data['Grade']['nota'] as $subject_id => $grade) {
			if (!empty($grade)){
				$gradeAux = array(
					'Grade' => array(
						'subject_id' => $subject_id,
						'student_id' => $student_id,
						'batch_id' => $batch_id,
						'period_id' => $data['Grade']['period_id'],
						'grade' => str_replace(',', '.', $grade)
					)
				);
				
				if (isset($grades[$subject_id])) {
					$gradeAux['Grade']['id'] = $grades[$subject_id]['Grade']['id'];
				} else {
					$this->create();
				}
				
				if (!($this->save($gradeAux))) {
					throw new RuntimeException(__('Não foi possível salvar as notas.'));
				}
			} else {
				$toDelete[] = $subject_id;
			}
		}

		if (!empty($toDelete)) {
			$conditions = array(
				'Grade.subject_id' => $toDelete,
				'Grade.student_id' => $student_id,
				'Grade.batch_id' => $batch_id,
				'Grade.period_id' => $data['Grade']['period_id'],
			);
			
			if (!($this->deleteAll($conditions))) {
				throw new RuntimeException(__('Não foi possível excluir as notas.'));
			}
		}
		
		$this->calculateCumulativeAvg($student_id, $batch_id, $data['Grade']['period_id']);
	}

/**
 * calculateCumulativeAvg method
 *
 * @return array
 */
	public function calculateCumulativeAvg($student_id, $batch_id, $period_id) {
		$contain = array();
		$fields = array('Period.id', 'Period.id');
		$conditions = array();
		$joins = array(
			array('table' => 'periods', 'alias' => 'ReferencePeriod', 'conditions' => array(
				'ReferencePeriod.id' => $period_id,
				'ReferencePeriod.year_id = Period.year_id',
				'Period.order <= ReferencePeriod.order'
			))
		);
		$periods = $this->Period->find('list', compact('contain', 'conditions', 'fields', 'joins'));
		
		$contain = array();
		$conditions = array('Grade.student_id' => $student_id, 'Grade.batch_id' => $batch_id, 'Grade.period_id' => $periods);
		$joins = array(
			array('table' => 'grades', 'alias' => 'PeriodGrade', 'conditions' => array('PeriodGrade.period_id' => $period_id, 'PeriodGrade.subject_id = Grade.subject_id', 'PeriodGrade.batch_id = Grade.batch_id', 'PeriodGrade.student_id = Grade.student_id'))
		);
		$fields = array('PeriodGrade.id', 'AVG(Grade.grade) AS Grade__cumulative_avg');
		$this->virtualFields['cumulative_avg'] = 0;
		
		$group = array('PeriodGrade.id', 'Grade.subject_id');
		$grades = $this->find('all', compact('contain', 'conditions', 'joins', 'fields', 'group'));
		
		foreach ($grades as $grade) {
			$gradeAux = array(
				'Grade' => array(
					'id' => $grade['PeriodGrade']['id'],
					'cumulative_avg' => $grade['Grade']['cumulative_avg']
				)
			);
			$this->save($gradeAux);
		}
	}

/**
 * rankGrades method
 *
 * @return array
 */
	public function rankGrades($school_id, $period_id) {
		
		$school_ranking = $this->rankGradesInSchool($school_id, $period_id);
		$school_cumulative_avg_ranking = $this->rankCumulativeAvgGradesInSchool($school_id, $period_id);
		$batch_cumulative_avg_ranking = $this->rankCumulativeAvgGradesInBatch($school_id, $period_id);
		
		$contain = array();
		$joins = array(
			array('table' => 'batches', 'alias' => 'Batch', 'conditions' => array('Batch.school_id' => $school_id, 'Batch.id = Grade.batch_id'))
		);
		$conditions = array('Grade.period_id' => $period_id);
		$fields = array('Grade.id', 'Grade.grade','Grade.subject_id', 'Grade.batch_id');
		$order = array('Grade.subject_id', 'Grade.batch_id', 'Grade.grade DESC');
		$grades = $this->find('all', compact('contain', 'joins', 'conditions','fields', 'order'));
		
		$counter = 0;
		$lastGrade = 0;
		$subject_id = 0;
		$batch_id = 0;
		foreach ($grades as $key => $grade) {
			if ($subject_id != $grade['Grade']['subject_id'] || $batch_id != $grade['Grade']['batch_id']) {
				$subject_id = $grade['Grade']['subject_id'];
				$batch_id = $grade['Grade']['batch_id'];
				$counter = 0;
				$lastGrade = null;
			}
			
			if (($lastGrade > $grade['Grade']['grade']) || ($lastGrade == null)) {
				$counter++;
				$lastGrade = $grade['Grade']['grade'];
			}
			
			$grades[$key]['Grade']['batch_ranking'] = $counter;
			$grades[$key]['Grade']['cumulative_avg_batch_ranking'] = $batch_cumulative_avg_ranking[$grade['Grade']['id']];
			$grades[$key]['Grade']['school_ranking'] = $school_ranking[$grade['Grade']['id']];
			$grades[$key]['Grade']['cumulative_avg_school_ranking'] = $school_cumulative_avg_ranking[$grade['Grade']['id']];
			unset($grades[$key]['Grade']['grade']);
			unset($grades[$key]['Grade']['subject_id']);
			unset($grades[$key]['Grade']['batch_id']);
		}
		
		return $this->saveMany($grades);
	}

/**
 * rankGradesInSchool method
 *
 * @return array
 */
	public function rankGradesInSchool($school_id, $period_id) {
		$contain = array();
		$joins = array(
			array('table' => 'batches', 'alias' => 'Batch', 'conditions' => array('Batch.school_id' => $school_id, 'Batch.id = Grade.batch_id'))
		);
		$conditions = array('Grade.period_id' => $period_id);
		$fields = array('Grade.id', 'Grade.grade','Grade.subject_id');
		$order = array('Grade.subject_id', 'Grade.grade DESC');
		$grades = $this->find('all', compact('contain', 'joins', 'conditions','fields', 'order'));
		
		$school_ranking = array();
		$counter = 0;
		$lastGrade = 0;
		$subject_id = 0;
		foreach ($grades as $key => $grade) {
			if ($subject_id != $grade['Grade']['subject_id']) {
				$subject_id = $grade['Grade']['subject_id'];
				$counter = 0;
				$lastGrade = null;
			}
			
			if (($lastGrade > $grade['Grade']['grade']) || ($lastGrade == null)) {
				$counter++;
				$lastGrade = $grade['Grade']['grade'];
			}
			$school_ranking[$grade['Grade']['id']] = $counter;
		}
		
		return $school_ranking;
	}
	
/**
 * rankCumulativeAvgGradesInSchool method
 *
 * @return array
 */
	public function rankCumulativeAvgGradesInSchool($school_id, $period_id) {
		$contain = array();
		$joins = array(
			array('table' => 'batches', 'alias' => 'Batch', 'conditions' => array('Batch.school_id' => $school_id, 'Batch.id = Grade.batch_id'))
		);
		$conditions = array('Grade.period_id' => $period_id);
		$fields = array('Grade.id', 'Grade.cumulative_avg','Grade.subject_id');
		$order = array('Grade.subject_id', 'Grade.cumulative_avg DESC');
		$grades = $this->find('all', compact('contain', 'joins', 'conditions','fields', 'order'));
		
		$school_cumulative_avg_ranking = array();
		$counter = 0;
		$lastGrade = 0;
		$subject_id = 0;
		foreach ($grades as $key => $grade) {
			if ($subject_id != $grade['Grade']['subject_id']) {
				$subject_id = $grade['Grade']['subject_id'];
				$counter = 0;
				$lastGrade = null;
			}
			
			if (($lastGrade > $grade['Grade']['cumulative_avg']) || ($lastGrade == null)) {
				$counter++;
				$lastGrade = $grade['Grade']['cumulative_avg'];
			}
			$school_cumulative_avg_ranking[$grade['Grade']['id']] = $counter;
		}
		
		return $school_cumulative_avg_ranking;
	}

/**
 * rankCumulativeAvgGradesInSchool method
 *
 * @return array
 */
	public function rankCumulativeAvgGradesInBatch($school_id, $period_id) {
		$contain = array();
		$joins = array(
			array('table' => 'batches', 'alias' => 'Batch', 'conditions' => array('Batch.school_id' => $school_id, 'Batch.id = Grade.batch_id'))
		);
		$conditions = array('Grade.period_id' => $period_id);
		$fields = array('Grade.id', 'Grade.cumulative_avg','Grade.subject_id', 'Grade.batch_id');
		$order = array('Grade.subject_id', 'Grade.batch_id', 'Grade.cumulative_avg DESC');
		$grades = $this->find('all', compact('contain', 'joins', 'conditions','fields', 'order'));
		
		$batch_cumulative_avg_ranking = array();
		$counter = 0;
		$lastGrade = 0;
		$subject_id = 0;
		$batch_id = 0;
		foreach ($grades as $key => $grade) {
			if ($subject_id != $grade['Grade']['subject_id'] || $batch_id != $grade['Grade']['batch_id']) {
				$subject_id = $grade['Grade']['subject_id'];
				$batch_id = $grade['Grade']['batch_id'];
				$counter = 0;
				$lastGrade = null;
			}
			
			if (($lastGrade > $grade['Grade']['cumulative_avg']) || ($lastGrade == null)) {
				$counter++;
				$lastGrade = $grade['Grade']['cumulative_avg'];
			}
			
			$batch_cumulative_avg_ranking[$grade['Grade']['id']] = $counter;
		}

		return $batch_cumulative_avg_ranking;
	}
}
