<?php
App::uses('AppController', 'Controller');
/**
 * Grades Controller
 *
 * @property Grade $Grade
 */
class GradesController extends AppController {

/**
 * add method
 *
 * @return void
 */
	public function add($batch_id, $student_id) {
		if ($this->request->is('post')) {
			if (empty($this->request->data['Grade']['period_id'])) {
				$this->Session->setFlash(__('É necessário selecionar um período.'));
			} else {
				if ((!empty($batch_id)) && (!empty($student_id))) {
					try {
						$this->Grade->saveGrades($batch_id, $student_id, $this->request->data);
						$this->Session->setFlash(__('As notas foram salvas com sucesso.'));
					} catch (RuntimeException $e) {
						$this->Session->setFlash(__($e->getMessage()));
					}
				} else {
					$this->Session->setFlash(__('As notas não foram salvas. Certifique-se de que o aluno e sua turma estão corretos.'));
				}
			}
		}
		
		$this->loadModel('Student');
		$contain = array('Batch', 'School');
		$conditions = array('Student.id' => $student_id);
		$student = $this->Student->find('first', compact('contain', 'conditions'));
		
		$periods = $this->Grade->Period->find('list');
		$this->set(compact('periods', 'student'));
	}

/**
 * studentgrade method
 *
 * @throws NotFoundException
 * @param string $student_id
 * @param string $batch_id
 * @return void
 */
	public function studentgrade() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Period']['id'])) {
				$data = $this->Grade->studentGrade($this->request->data['Student']['id'], $this->request->data['Period']['id'], $this->request->data['Batch']['id']);
			} else {
				$data = '';
			}
			$this->set('aaData', $data);
			$this->set('_serialize', array('aaData'));
		}
	}
}
