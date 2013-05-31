<?php

class Admin_HomeController extends Zend_Controller_Action {
	
	public function init() {
		
		/*
		 * Initialize action controller here
		 */
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return $this->_helper->redirector->goToRoute ( array ('module' => 'admin', 'controller' => 'login' ), null, true );
		
		}
		
	}
	
	public function indexAction() {
		// action body
		$usuario = Zend_Auth::getInstance()->getIdentity();
		$this->view->usuario = $usuario;
	}

}

