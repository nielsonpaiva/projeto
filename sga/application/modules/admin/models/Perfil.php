<?php

class Admin_Model_Perfil extends Zend_Db_Table
{
protected $_name = 'Perfil';
protected $_primary = 'Id_Perfil';

public function carregar(){
	try {
		$rows = $this->select()
		->from(array($this->_name,array('Id_Perfil')))
		->columns(array('Id_Perfil','Perfil'))
		->order('Id_Perfil asc');

		return $this->fetchAll($rows)->toArray();

	} catch (Zend_Db_Exception $e) {
	}
}

public function listar(){
	$sql = $this->select()->setIntegrityCheck(false)
	->from($this->_name,array('Id_Perfil'))
	->columns(array('Id_Perfil','Perfil'))
	->order('Id_Perfil desc')
	->group('Id_Perfil');
	return $this->fetchAll()->toArray();
}

public function busca($id){
	try{
		$sql =  $this->select()
		->where('Id_Perfil = ?', $id);
		$row = $this->fetchRow($sql);
		if(null !== $row)
			return $row->toArray();
	}catch(Exception $e){
		return $e->getMessage();
	}
}

public function inserir(array $dados){
	
}

public function colunas(Array $dados){
	$ret = array();
	foreach ($dados as $coluna=>$valor) {
		if(in_array($coluna, $this->_getCols()))
			$ret[$coluna] = $valor;
	}
	return $ret;
}

public function excluir($id){
	try {
		$where = $this->getAdapter()->quoteInto("Id_Perfil = ?", $id);
		return parent::delete($where);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
}

