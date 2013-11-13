<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		'Auth' => array(
        	'authorize' => array('Controller'),
        	'authenticate' => array(
        		'Form' => array(
					'userModel' => 'User',
					'fields' => array('username' => 'email')
				)
			),
        	'loginRedirect' => array('controller' => 'students', 'action' => 'view'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => 'Você não possui permissões para acessar esta sessão.'
		),
		'Session',
		'RequestHandler',
		'DebugKit.Toolbar',
		'DataTables.DataTables'
    );
	
	public $helpers = array(
		'Session',
		'Html',
		'Form',
        'Js'
    );
	
	public $layout = 'boletim';
	
	function isAuthorized(){
		
		$user = $this->Auth->user();
		$group = $user['group'];

		if ($group == 'admin') {
			return true;
		}
		
		$permissions = $this->permissions;
		
		if (!empty($permissions[$group])) {
			$permissions = $permissions[$group];
			
			if ($permissions == '*') {
				return true;
			}
			
			$action = $this->action;
			if (in_array($action, $permissions)) {
				return true;
			}
			
		}
        
        return false;
	}
	
	protected function _setUserInfo() {
		$user = $this->Auth->user();

		$this->loadModel('Student');
		$this->loadModel('Period');
		$user = array_merge($user, $this->Student->ofUser($user['id']), $this->Period->current());
		
		$this->Session->write('Auth.User', $user);
	}
	
}
