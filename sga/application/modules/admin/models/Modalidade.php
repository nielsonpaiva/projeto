<?php

class Admin_Model_Modalidade extends Zend_Db_Table
{
protected $_name = 'Modalidade_Servico';
protected $_primary = 'Id_Modalidade';

public function inserir(Array $dados){
	try {
		$dados = self::colunas($dados);
		return parent::insert($dados);
	} catch (Exception $e) {
	}
	
}

public function colunas(Array $dados){
	$ret = array();
	foreach ($dados as $coluna=>$valor) {
		if(in_array($coluna, $this->_getCols()))
			$ret[$coluna] = $valor;
	}
	 
	return $ret;
}

public function listar(){
	$sql = $this->select()->setIntegrityCheck(false)
	 ->from($this->_name,array('Id_Modalidade'))
	 ->columns(array('Id_Modalidade','Modalidade'))
	 ->order('Id_Modalidade desc')
	 ->group('Id_Modalidade');
	return $this->fetchAll()->toArray();
}

public function busca($id){
	try{
		$sql =  $this->select()
		->where('Id_Modalidade = ?', $id);
		$row = $this->fetchRow($sql);
		if(null !== $row)
			return $row->toArray();
	}catch(Exception $e){
		return $e->getMessage();
	}
}

public function excluir($id){
	try {
		$where = $this->getAdapter()->quoteInto("Id_Modalidade = ?", $id);
		return parent::delete($where);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}


}

