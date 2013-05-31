<?php

class Default_IndexController extends Zend_Controller_Action {
	
	public function init() {
		/*
		 * Initialize action controller here
		 */
		/*$acl = new Zend_Acl();
		$role = 'Cliente';*/
		
	}
	
	public function indexAction() {
		// action body
		$usuario = Zend_Auth::getInstance()->getIdentity();
		$this->view->usuario = $usuario;
	}

}

