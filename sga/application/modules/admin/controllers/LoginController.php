<?php

class Admin_LoginController extends Zend_Controller_Action {
	
	public function init() {
		/*
		 * Initialize action controller here
		 */
		
		$this->_helper->layout->disableLayout();//desabilita o layout padr�o do sistema p/ esse controlador
	}
	
	public function indexAction() {
		// action body
	}
	
	public function loginAction() {
		$this->_flashMessenger = $this->_helper->getHelper ( 'FlashMessenger' );
		$this->view->messages = $this->_flashMessenger->getMessages ();
		// Definindo o helper para disparar mensagens de erro no formul�rio
		$form = new Admin_Form_Login ();
		$this->view->form = $form;
		// verifica se o m�todo http � POST
		if ($this->getRequest ()->isPost ()) {
			$data = $this->getRequest ()->getPost ();
			// verifica se o formul�rio foi preenchido com os dados corretos
			if ($form->isValid ( $data )) {
				// pega os dados digitados no form
				$login = $form->getValue ( 'login' );
				$senha = $form->getValue ( 'senha' );
				try {
					Admin_Model_Login::login ( $login, $senha ); // realiza o login no
					                                          // sistema
					                                          // redireciona para o
					                                          // controlador Index
					
					$role = Zend_Auth::getInstance()->getIdentity()->_roleId;
					if($role == 'Cliente'){
						return $this->_helper->redirector->goToRoute ( array ('module' => 'default', 'controller' => 'cliente' ), null, true );
					}else{
						return $this->_redirect('/');
					}
					 	
					 
				} catch ( Exception $e ) {
					// Dados inv�lidos. Retorna a mensagem de erro e redireciona
					// para a p�gina de login.
					$this->_helper->FlashMessenger ( $e->getMessage () );
					$this->_redirect ( '/login/login' );
				}
			} else {
				// Formul�rio digitado incorretamente
				$form->populate ( $data );
			}
		
		}
		
		$veiculos = new Admin_Model_Veiculo();
	
		$sql = $veiculos->listarVeiculos();
		$this->view->titulo = 'Veículos disponíveis para locação e venda';
		$this->view->veiculos = $sql;
	}
	
	public function logoutAction() {
		// action body
		$auth = Zend_Auth::getInstance ();
		$auth->clearIdentity (); // limpa os dados do usu�rio da sess�o
		return $this->_helper->redirector ('index'); // retorna para a index
	}

}





