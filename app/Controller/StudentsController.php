<?php
App::uses('AppController', 'Controller');
/**
 * Students Controller
 *
 * @property Student $Student
 */
class StudentsController extends AppController {
	
/**
 * Permissions
 *
 * @var array
 */	
	public $permissions = array(
		'student' => array('view', 'data')
	);

/**
 * index method
 *
 * @return void
 */
	public function index($batch_id = null) {
		$this->loadModel('Batch');
		$contain = array('School');
		$conditions = array('Batch.id' => $batch_id);
		$batch = $this->Batch->find('first', compact('contain', 'conditions'));
		if (empty($batch)) {
			throw new NotFoundException(__('É necessário selecionar uma turma'));
		} else {
			$this->set('batch', $batch);
		}
	}

/**
 * pagination method
 *
 * @return void
 */
	public function pagination($batch_id) {
		if ($this->request->is('post')) {
			$conditions = array('Student.batch_id' => $batch_id);
			$contain = array(
				'User'
			);
			$this->set('aaData', $this->Student->find('all', compact('contain', 'conditions')));
			$this->set('_serialize', array('aaData'));
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
		$user = $this->Auth->user();
		
		if($user['group'] == 'admin') {
			$id = $id;
		} else {
			$id = $user['Student']['id'];
		}
		
		$contain = array();
		$conditions = array('Student.id' => $id);
		$student = $this->Student->find('first', compact('contain', 'conditions'));
		
		if (empty($student)) {
			throw new NotFoundException(__('Invalid student'));
		}
		
		$this->set('student', $student);
	}

/**
 * data method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function data() {
		if ($this->request->is('post')) {
			$user = $this->Auth->user();
			
			if($user['group'] == 'admin') {
				$id = $this->request->data['Student']['id'];
			} else {
				$id = $user['Student']['id'];
			}
			
			$this->loadModel('Period');
			
			$data = $this->Student->ofId($id);
			$data['Period'] = $user['Period'];
			$data['Periods'] = $this->Period->ofYear($user['Year']['id']);
			$data['Grades'] = $this->Student->Grade->ofStudentInBatch($data, $user['Year']['id']);
			//$data['Warnings'] = $this->Student->warnings($data);
			
			$_serialize = array('data');
			$this->set(compact('data', '_serialize'));
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add($batch_id) {
		$this->loadModel('Batch');
		$contain = array('School');
		$conditions = array('Batch.id' => $batch_id);
		$batch = $this->Batch->find('first', compact('contain', 'conditions'));
		if (!empty($batch)) {
			if ($this->request->is('post')) {
				$this->request->data['Student']['batch_id'] = $batch['Batch']['id'];
				$this->request->data['Student']['school_id'] = $batch['Batch']['school_id'];
				
				$this->Student->create();
				if ($this->Student->save($this->request->data)) {
					$this->Session->setFlash(__('O aluno foi salvo'));
					$this->redirect(array('action' => 'index', $batch['Batch']['id']));
				} else {
					$this->Session->setFlash(__('O aluno não pode ser salvo. Tente novamente.'));
				}
			}
			$this->set(compact('batch'));
		} else {
			throw new NotFoundException(__('O aluno não foi encontrado.'));
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('O aluno não foi encontrado.'));
		}
		$contain = array('School', 'Batch');
		$conditions = array('Student.id' => $id);
		$student = $this->Student->find('first', compact('contain', 'conditions'));
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('O aluno foi salvo'));
				$this->redirect(array('action' => 'index', $student['Student']['batch_id']));
			} else {
				$this->Session->setFlash(__('O aluno não pode ser salvo. Tente novamente.'));
			}
		} else {
			$this->request->data = $student;
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$contain = array();
		$conditions = array('Student.id' => $id);
		$student = $this->Student->find('first', compact('contain', 'conditions'));
		if (empty($student)) {
			throw new NotFoundException(__('O aluno não foi encontrado.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Student->delete($student['Student']['id'])) {
			$this->Session->setFlash(__('O aluno foi deletado'));
			$this->redirect(array('action' => 'index', $student['Student']['batch_id']));
		}
		$this->Session->setFlash(__('O aluno não foi deletado'));
		$this->redirect(array('action' => 'index', $student['Student']['batch_id']));
	}
}
