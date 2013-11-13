<?php
App::uses('AppController', 'Controller');
/**
 * Batches Controller
 *
 * @property Batch $Batch
 */
class BatchesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($school_id = null) {
		$this->loadModel('School');
		$contain = array();
		$conditions = array('School.id' => $school_id);
		$school = $this->School->find('first', compact('contain', 'conditions'));
		if (empty($school)) {
			throw new NotFoundException(__('É necessário selecionar uma escola'));
		} else {
			$this->set('school', $school);
		}
		
		$this->set('years', $this->Batch->Year->find('list', array('order' => 'Year.year')));
	}
	
/**
 * pagination method
 *
 * @return void
 */
	public function pagination() {
		if ($this->request->is('post')) {
			$conditions = array('Batch.school_id' => $this->request->data['School']['id'], 'Batch.year_id' => $this->request->data['Year']['id']);
			$contain = array(
				'Course'
			);
			$this->set('aaData', $this->Batch->find('all', compact('contain', 'conditions')));
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
		if (!$this->Batch->exists($id)) {
			throw new NotFoundException(__('Invalid batch'));
		}
		$options = array('conditions' => array('Batch.' . $this->Batch->primaryKey => $id));
		$this->set('batch', $this->Batch->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($school_id) {
		$this->loadModel('School');
		$contain = array();
		$conditions = array('School.id' => $school_id);
		$school = $this->School->find('first', compact('contain', 'conditions'));
		if (!empty($school)) {
			if ($this->request->is('post')) {
				$this->request->data['Batch']['school_id'] = $school_id;
				$this->Batch->create();
				if ($this->Batch->save($this->request->data)) {
					$this->Session->setFlash(__('A turma foi salva'));
					$this->redirect(array('action' => 'index', $school_id));
				} else {
					$this->Session->setFlash(__('A turma não pode ser salva. Tente novamente.'));
				}
			}
			$contain = array();
			$conditions = array();
			$fields = array('Course.id', 'Course.description');
			$courses = $this->Batch->Course->find('list', compact('contain', 'conditions', 'fields'));
			
			$contain = array();
			$conditions = array();
			$fields = array('Year.id', 'Year.year');
			$years = $this->Batch->Year->find('list', compact('contain', 'conditions', 'fields'));
			$this->set(compact('school', 'courses', 'years'));
		} else {
			throw new NotFoundException(__('A turma não foi encontrada.'));
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
		if (!$this->Batch->exists($id)) {
			throw new NotFoundException(__('A turma não foi encontrada.'));
		}
		$contain = array('School');
		$conditions = array('Batch.id' => $id);
		$batch = $this->Batch->find('first', compact('contain', 'conditions'));
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Batch->save($this->request->data)) {
				$this->Session->setFlash(__('A turma foi salva'));
				$this->redirect(array('action' => 'index', $batch['Batch']['school_id']));
			} else {
				$this->Session->setFlash(__('A turma não pode ser salva. Tente novamente.'));
			}
		} else {
			$this->request->data = $batch;
		}
		$contain = array();
		$conditions = array();
		$fields = array('Course.id', 'Course.description');
		$courses = $this->Batch->Course->find('list', compact('contain', 'conditions', 'fields'));
		
		$contain = array();
		$conditions = array();
		$fields = array('Year.id', 'Year.year');
		$years = $this->Batch->Year->find('list', compact('contain', 'conditions', 'fields'));
		$this->set(compact('courses', 'years'));
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
		$conditions = array('Batch.id' => $id);
		$batch = $this->Batch->find('first', compact('contain', 'conditions'));
		if (empty($batch)) {
			throw new NotFoundException(__('A turma não foi encontrada.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Batch->delete($batch['Batch']['id'])) {
			$this->Session->setFlash(__('A turma foi deletada'));
			$this->redirect(array('action' => 'index', $batch['Batch']['school_id']));
		}
		$this->Session->setFlash(__('A turma não foi deletada'));
		$this->redirect(array('action' => 'index', $batch['Batch']['school_id']));
	}
}
