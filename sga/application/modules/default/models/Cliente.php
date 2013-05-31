<?php

class Default_Model_Cliente extends Zend_Db_Table
{
protected $_name = "Venda";
protected $_primary = "Numero";


protected function colunas(Array $dados){
		$ret = array();
		foreach ($dados as $coluna=>$valor) {
			if(in_array($coluna, $this->_getCols()))
				$ret[$coluna] = $valor;
		}
		return $ret;
}
	
	public function inserir(Array $dados){
		try {
			$dados = self::colunas($dados);
			return parent::insert($dados);
		} catch (Exception $e) {
		}
	
	}


}

