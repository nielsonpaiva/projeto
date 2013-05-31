<?php
class Aplicacao_Acl_Setup extends Zend_Controller_Plugin_Abstract {
	/**
	 *
	 * @var Zend_Acl
	 */
	protected $_acl;
	
	public function __construct() {
		$this->_acl = new Zend_Acl ();
		
		$this->_initialize ();
	}
	
	protected function _initialize() {
		
		$this->_setupRoles ();
		$this->_setupResources ();
		$this->_setupPrivileges ();
		$this->_saveAcl ();
	
	}
	
	protected function _setupRoles() {
		$this->_acl->addRole ( new Zend_Acl_Role ( 'guest' ) );
		$this->_acl->addRole ( new Zend_Acl_Role ( 'Vendedor' ), 'guest' );
		$this->_acl->addRole ( new Zend_Acl_Role ( 'Cliente' ), 'guest' );
		$this->_acl->addRole ( new Zend_Acl_Role ( 'Administrador' ), 'Vendedor','Cliente' );
	}
	
	protected function _setupResources() {
		$this->_acl->add ( new Zend_Acl_Resource ( 'login' ) );
		$this->_acl->add ( new Zend_Acl_Resource ( 'error' ) );
		$this->_acl->add ( new Zend_Acl_Resource ( 'index' ) );
		$this->_acl->add ( new Zend_Acl_Resource ( 'home' ) );
		$this->_acl->add ( new Zend_Acl_Resource ( 'cliente' ) );
		$this->_acl->add ( new Zend_Acl_Resource ( 'veiculo' ) );
		$this->_acl->add ( new Zend_Acl_Resource ( 'fornecedor' ) );
		$this->_acl->add ( new Zend_Acl_Resource ( 'modalidade') );
		$this->_acl->add ( new Zend_Acl_Resource ( 'perfil') );
		$this->_acl->add ( new Zend_Acl_Resource ( 'usuario') );
	}
	
	protected function _setupPrivileges() {
		$this->_acl->allow ( 'guest', 'login', array ('index', 'login' ) )->allow ( 'guest', 'error', array ('error', 'forbidden' ) );
		$this->_acl->allow ( 'Vendedor', 'login', 'logout' );
		$this->_acl->allow ( 'Vendedor', 'index' );
		$this->_acl->allow ( 'Cliente', 'cliente' );
		$this->_acl->allow ( 'Cliente', 'fornecedor' );
		$this->_acl->allow ( 'Cliente', 'login', 'logout' );
		$this->_acl->allow ( 'Vendedor', 'home' );
		$this->_acl->allow ( 'Administrador', 'home', 'index' );
		$this->_acl->allow ( 'Administrador', 'veiculo' );
		$this->_acl->allow ( 'Administrador', 'cliente');
		$this->_acl->allow ( 'Administrador', 'fornecedor');
		$this->_acl->allow ( 'Administrador', 'modalidade');
		$this->_acl->allow ( 'Administrador', 'perfil');
		$this->_acl->allow ( 'Administrador', 'usuario');
		
		
	}
	
	protected function _saveAcl() {
		$registry = Zend_Registry::getInstance ();
		$registry->set ( 'acl', $this->_acl );
	}

}