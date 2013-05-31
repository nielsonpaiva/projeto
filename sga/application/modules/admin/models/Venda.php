<?php

class Admin_Model_Venda extends Zend_Db_Table
{

protected $_name = 'Venda';
protected $_primary = 'Numero';


public function solicitar_servico(Array $dados){
	try {
		$dados = self::colunas($dados);
		return parent::insert($dados);
	} catch (Exception $e) {
	}
	
}

protected function colunas(Array $dados){
	$ret = array();
	foreach ($dados as $coluna=>$valor) {
		if(in_array($coluna, $this->_getCols()))
			$ret[$coluna] = $valor;
	}
	 
	return $ret;
}

}

