<?php
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap {
	protected function _initAutoloader() {
		
		$autoloader = Zend_Loader_Autoloader::getInstance ();
		$autoloader->registerNamespace ( 'Aplicacao' );
	
	}
	
	protected function _initPlugins() {
		$bootstrap = $this->getApplication ();
		if ($bootstrap instanceof Zend_Application) {
			$bootstrap = $this;
		}
		$bootstrap->bootstrap ( 'FrontController' );
		$front = $bootstrap->getResource ( 'FrontController' );
		
		$front->registerPlugin ( new Aplicacao_Plugin_Auth () );
	}

}