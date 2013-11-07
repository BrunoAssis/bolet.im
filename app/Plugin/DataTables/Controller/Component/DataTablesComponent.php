<?php
App::uses('Component', 'Controller');

class DataTablesComponent extends Component {
	
	private $controller;
	private $_settings = array('delimitador' => ',');
	private $object;
	
	public function __construct(ComponentCollection $collection, $settings) {
		$this->controller = $collection->getController();
	}
	
	public function paginate( $object = NULL, $scope = array ( ), $whitelist = array ( ) ){
		
		$this->object = (!empty($object) ? $object : $this->controller->modelClass);
		
		$params = $this->parametrosDatatable();
		if (isset($this->controller->paginate[$this->object])) {
			$params = array($this->object => $params);
		}
		
		$this->controller->paginate = Hash::merge($this->controller->paginate, $params);
		
		$a = $this->controller->paginate($this->object, $scope, $whitelist);
		
		$this->controller->set('aaData', $a);

		$pag = &$this->controller->request->params['paging'][$this->object];

		$this->controller->set('iTotalRecords', $pag['count']);
		$this->controller->set('iTotalDisplayRecords', $pag['count']);
		$this->controller->set('sEcho', $this->controller->request->data['sEcho']);
		
        $this->controller->set('_serialize', array('sEcho','iTotalRecords', 'iTotalDisplayRecords', 'aaData'));
	}
	
	public function parametrosDatatable(){
		$paginacao = array();

		$this->controller->request->data = $this->trataParametros($this->controller->request->data);
		
		if(isset($this->controller->request->data['dataTablesFind'])){
			if($this->controller->request->data['dataTablesFind']){
				unset($this->controller->request->data['iDisplayLength']);
			}
		}

		if(isset($this->controller->request->data['iDisplayLength'])){
			if($this->controller->request->data['iDisplayLength'] == -1){
				$paginacao['limit'] = $this->controller->{$this->object}->find('count');
				$paginacao['maxLimit'] = $paginacao['limit'];
			}else{
				$paginacao['limit'] = $this->controller->request->data['iDisplayLength'];
			}
		}
		unset($this->controller->request->data['iDisplayLength']);
		
		if(isset($this->controller->request->data['iDisplayStart'])){
			if($this->controller->request->data['iDisplayStart'] == 0){
				$paginacao['page'] = 1;
			}else{
				$paginacao['page'] = $this->controller->request->data['iDisplayStart']/$paginacao['limit']+1;
			}
		}
		unset($this->controller->request->data['iDisplayStart']);
		
		
		//Sort
		if(!empty($this->controller->request->data['iSortCol'])){

			$order = array();
			foreach ($this->controller->request->data['iSortCol'] as $key => $col) {
				$col = str_replace('0.', '',$this->controller->request->data['mDataProp'][$col]);
				$order[$col] = $this->controller->request->data['sSortDir'][$key];
			}
			$paginacao['order'] = $order;
		}


		//Search
		if(isset($this->controller->request->data['sSearchAll'])){
			if(!empty($this->controller->request->data['sSearchAll'])){
				$searchCols = array();
				foreach ($this->controller->request->data['bSearchable'] as $nColuna => $searchable) {
					if($searchable == 'true' && $this->controller->request->data['mDataProp'][$nColuna] != 'function'){
						$searchCols[$this->controller->request->data['mDataProp'][$nColuna].' LIKE'] = '%'.$this->controller->request->data['sSearchAll'].'%';
					}
				}
				
				$paginacao['conditions'][] = array('OR' => $searchCols);
			}
		}

		return $paginacao;
	}

	public function trataParametros($array){
		//necessário para que a pesquisa por coluna não sobrescreva a pesquisa geral
		$array['sSearchAll'] = $array['sSearch'];
		
		$array = Hash::expand($array, '_');
		
		return $array;
	}

	/*
	 * $type = jgrowl, error, success, warning, information, note
	 */
	/*public function setFlash($message = '', $type = 'error', $options = array()){
		
		$element = 'Mango.alertMsg';
		if($type == 'jgrowl'){
			$element = 'Mango.jgrowl';
		}
		
		$this->controller->Session->setFlash($message, $element, $options, $type);
	}*/
}