<?php
App::uses('AppController', 'Controller');
/**
 * Years Controller
 *
 * @property Year $Year
 */
class YearsController extends AppController {

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
			$this->Year->recursive = -1;
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
		if (!$this->Year->exists($id)) {
			throw new NotFoundException(__('Invalid year'));
		}
		$options = array('conditions' => array('Year.' . $this->Year->primaryKey => $id));
		$this->set('year', $this->Year->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Year->create();
			if ($this->Year->save($this->request->data)) {
				$this->Session->setFlash(__('O ano foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O ano não pode ser salvo. Tente novamente.'));
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
		if (!$this->Year->exists($id)) {
			throw new NotFoundException(__('O ano não foi encontrado.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Year->save($this->request->data)) {
				$this->Session->setFlash(__('O ano foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O ano não pode ser salvo. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Year.' . $this->Year->primaryKey => $id));
			$this->request->data = $this->Year->find('first', $options);
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
		$this->Year->id = $id;
		if (!$this->Year->exists()) {
			throw new NotFoundException(__('O ano não foi encontrado.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Year->delete()) {
			$this->Session->setFlash(__('O ano foi deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('O ano não pode ser deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
