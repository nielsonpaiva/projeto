<?php

class Admin_Model_Estado extends Zend_DB_Table
{
	protected $_name = 'Estado';
	protected $_primary = 'Id_Estado';

	public function carregar(){
	try {
		$rows = $this->select()
		->from(array($this->_name,array('Id_Estado')))
		->columns(array('Id_Estado','Sigla'))
		->order('Id_Estado asc');
	
		return $this->fetchAll($rows)->toArray();
	
	} catch (Zend_Db_Exception $e) {
	}
	}
}

