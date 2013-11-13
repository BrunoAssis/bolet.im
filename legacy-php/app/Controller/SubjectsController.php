<?php
App::uses('AppController', 'Controller');
/**
 * Subjects Controller
 *
 * @property Subject $Subject
 */
class SubjectsController extends AppController {

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
			$this->Subject->recursive = -1;
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
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
		$this->set('subject', $this->Subject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subject->create();
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('A disciplina foi salva'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A disciplina não pode ser salva. Tente novamente.'));
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
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('A disciplina não foi encontrada.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('A disciplina foi salva'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A disciplina não pode ser salva. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
			$this->request->data = $this->Subject->find('first', $options);
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
		$this->Subject->id = $id;
		if (!$this->Subject->exists()) {
			throw new NotFoundException(__('A disciplina não foi encontrada.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subject->delete()) {
			$this->Session->setFlash(__('A disciplina foi deletada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('A disciplina não foi deletada'));
		$this->redirect(array('action' => 'index'));
	}
}
