<?php

class Admin_Model_Usuario extends Zend_DB_Table implements Zend_Acl_Role_Interface {
    private $_userName;
	public $_roleId;
	public $_fullName;
	public $_userId;
	protected $_name = 'Usuario';
	protected $_primary = 'Id_Usuario';
	
	public function getUserId()
	{
		return $this->_userId;
	}
	
	public function setUserId($userId)
	{
		$this->_userId = (int) $userId;
	}
	
	public function getUserName()
	{
		return $this->_userName;
	}
	
	public function setUserName($userName)
	{
		$this->_userName = (string) $userName;
	}
	
	public function getFullName()
	{
		return $this->_fullName;
	}
	
	public function setFullName($fullName)
	{
		$this->_fullName = (string) $fullName;
	}
	/**
	 *
	 */
	public function getRoleId()
	{
		return $this->_roleId;
	}
	
	public function setRoleId($roleId)
	{
		$this->_roleId = (string) $roleId;
	}
	
	public function inserir(){
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
		->from($this->_name,array('Id_Usuario'))
		->columns(array('Id_Usuario','CPF','Nome','Endereco','Numero','Data_nascimento','Sexo','Telefone','E_mail','Profissao'))
		->join('Perfil','Usuario.Perfil_Id_Perfil = Perfil.Id_Perfil',array('Perfil'))
		->order("Usuario.Id_Usuario asc")
		->group('Usuario.Id_Usuario')
		->limit(100);
		return $this->fetchAll($sql)->toArray();
	}
	
	public function busca($id){
		try{
			$sql =  $this->select()
			->where('Id_Usuario = ?', $id);
			$row = $this->fetchRow($sql);
			if(null !== $row)
				return $row->toArray();
		}catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public function excluir($id){
		try {
			$where = $this->getAdapter()->quoteInto("Id_Usuario = ?", $id);
			return parent::delete($where);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}
