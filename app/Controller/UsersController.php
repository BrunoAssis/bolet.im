<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * beforeFilter method
 *
 * @return void
 * @access public
 */
	public function beforeFilter() {
	    parent::beforeFilter();
		$this->Auth->allow(array('login', 'logout'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * login method
 *
 * @return void
 * @access public
 */
	public function login() {
		
		$u = $this->Auth->user();
		if (!empty($u)) {
			return $this->redirect('/painel');
		}
		
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	$this->_setUserInfo();
				$user = $this->Auth->user();
				
				$redirect = $this->Auth->redirect();
				
				if (!empty($user)) {
					if ($user['group'] == 'admin') {
						$this->components['Auth']['loginRedirect'] = '/admin';
						if ($redirect == '/painel') {
							$redirect = $this->components['Auth']['loginRedirect'];
						}
					}
				}
	            return $this->redirect($redirect);
	        } else {
	            $this->Session->setFlash(__('Usuário ou senha não encontrados. Tente novamente.'));
	        }
	    }
	}

/**
 * logout method
 *
 * @return void
 * @access public
 */	
	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}
}
