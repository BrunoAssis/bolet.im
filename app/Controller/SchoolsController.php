<?php
App::uses('AppController', 'Controller');
/**
 * Schools Controller
 *
 * @property School $School
 */
class SchoolsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
	}

/**
 * pagination method
 *
 * @return void
 */
	public function pagination() {
		if ($this->request->is('post')) {
			$this->School->recursive = -1;
			$this->DataTables->paginate();
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
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
		$this->set('school', $this->School->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->School->create();
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('A escola foi salva'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A escola não pode ser salva. Tente novamente.'));
			}
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
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('A escola não foi encontrada.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('A escola foi salva'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A escola não pode ser salva. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
			$this->request->data = $this->School->find('first', $options);
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
		$this->School->id = $id;
		if (!$this->School->exists()) {
			throw new NotFoundException(__('A escola não foi encontrada.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->School->delete()) {
			$this->Session->setFlash(__('A escola foi deletada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('A escola não foi deletada'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function schoolGrade($id = null) {
		$this->School->id = $id;
		if (!$this->School->exists()) {
			throw new NotFoundException(__('A escola não foi encontrada.'));
		}
		$contain = array();
		$conditions = array('School.id' => $id);
		$school = $this->School->find('first', compact('contain', 'conditions'));
		
		if ($this->request->is('post')) {
			if (!empty($this->request->data['School']['period_id'])) {
				$this->loadModel('SchoolGrade');
				if ($this->SchoolGrade->calculateGrade($id, $this->request->data['School']['period_id'])) {
					$this->Session->setFlash(__('Nota calculada com sucesso.'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Não foi possível calcular a nota. Tente novamente.'));
				}
			} else {
				$this->Session->setFlash(__('Não foi possível calcular a nota. Selecione um período e tente novamente.'));
			}
		}
		$this->loadModel('Period');
		$contain = array();
		$conditions = array();
		$periods = $this->Period->find('list', compact('contain', 'conditions'));
		$this->set(compact('periods', 'school'));
	}
	
}
