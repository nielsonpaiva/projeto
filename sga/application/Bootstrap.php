<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	
	
	
	protected function _initAutoload() {
		$autoloader = new Zend_Application_Module_Autoloader ( array ('basePath' => APPLICATION_PATH, 'namespace' => '' ) );
		return $autoloader;
	}
	
	protected function _initAc() {
		
		$aclSetup = new Aplicacao_Acl_Setup ();
	
	}
	
	protected function _initDocType(){
		
		$this->_bootstrap('view');
		$view = $this->getResource('view');
		//Doctype
		$view->doctype('XHTML1_TRANSITIONAL');
		//título do sistema
	    $view->headTitle('SGA')->setSeparator(' | ');
	    //arquivo de folha de estilo
	    $view->headLink()->prependStylesheet('/sga/public/css/style.css');
	    
	    
	}

}

