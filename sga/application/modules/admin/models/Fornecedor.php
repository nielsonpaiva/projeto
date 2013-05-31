<?php

class Admin_Model_Fornecedor extends Zend_Db_Table
{
	protected $_name = 'Fornecedor';
	protected $_primary = 'CNPJ';

	public function listar(){
		$sql = $this->select()->setIntegrityCheck(false)
		->from($this->_name,array('CNPJ'))
		->columns(array('CNPJ','Razao_Social','Endereco','Cidade','Numero','Telefone','E_mail'))
		->join('Estado','Fornecedor.Estado_Id_Estado = Estado.Id_Estado',array('Nome','Sigla'))
		->order("CNPJ asc")
		->group('Fornecedor.CNPJ')
		->limit(50);
		return $this->fetchAll($sql)->toArray();
	}
	
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
	
	public function busca($id){
		try{
			$sql =  $this->select()
			->where('CNPJ = ?', $id);
			$row = $this->fetchRow($sql);
			if(null !== $row)
				return $row->toArray();
		}catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public function excluir($id){
		try {
			$where = $this->getAdapter()->quoteInto("CNPJ = ?", $id);
			return parent::delete($where);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function carregar(){
		try {
			$rows = $this->select()
			->from(array($this->_name,array('CNPJ')))
			->columns(array('CNPJ','Razao_Social'))
			->order('CNPJ asc');
			return $this->fetchAll($rows)->toArray();
		} catch (Zend_Db_Exception $e) {
		}
	}

}

