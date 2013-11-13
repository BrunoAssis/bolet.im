<?php
App::uses('AppController', 'Controller');
/**
 * Periods Controller
 *
 * @property Period $Period
 */
class PeriodsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($year_id = null) {
		$this->loadModel('Year');
		$contain = array();
		$conditions = array('Year.id' => $year_id);
		$year = $this->Year->find('first', compact('contain', 'conditions'));
		
		if (empty($year)) {
			throw new NotFoundException(__('É necessário selecionar um ano letivo'));
		} else {
			$this->set('year', $year);
		}
	}
	
/**
 * pagination method
 *
 * @return void
 */
	public function pagination($year_id) {
		if ($this->request->is('post')) {
			$conditions = array('Period.year_id' => $year_id);
			$contain = array();
			$this->set('aaData', $this->Period->find('all', compact('contain', 'conditions')));
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
		if (!$this->Period->exists($id)) {
			throw new NotFoundException(__('Invalid period'));
		}
		$options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
		$this->set('period', $this->Period->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($year_id) {
		$this->loadModel('Year');
		$contain = array();
		$conditions = array('Year.id' => $year_id);
		$year = $this->Year->find('first', compact('contain', 'conditions'));
		if (!empty($year)) {
			if ($this->request->is('post')) {
				$this->request->data['Period']['year_id'] = $year['Year']['id'];
				$this->Period->create();
				if ($this->Period->save($this->request->data)) {
					$this->Session->setFlash(__('O período foi salvo'));
					$this->redirect(array('action' => 'index', $year['Year']['id']));
				} else {
					$this->Session->setFlash(__('O período não pode ser salvo. Tente novamente.'));
				}
			}
			$this->set(compact('year'));
		} else {
			throw new NotFoundException(__('O período não foi encontrado.'));
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
		if (!$this->Period->exists($id)) {
			throw new NotFoundException(__('O período não foi encontrado.'));
		}
		$contain = array('Year');
		$conditions = array('Period.id' => $id);
		$period = $this->Period->find('first', compact('contain', 'conditions'));
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Period->save($this->request->data)) {
				$this->Session->setFlash(__('O período foi salvo'));
				$this->redirect(array('action' => 'index', $period['Period']['year_id']));
			} else {
				$this->Session->setFlash(__('O período não pode ser salvo. Tente novamente.'));
			}
		} else {
			$this->request->data = $period;
		}
		
		$years = $this->Period->Year->find('list');
		$this->set(compact('years'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Period->id = $id;
		if (!$this->Period->exists()) {
			throw new NotFoundException(__('O período não foi encontrado.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Period->delete()) {
			$this->Session->setFlash(__('O período foi deletado.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('O período não foi deletado.'));
		$this->redirect(array('action' => 'index'));
	}
}
