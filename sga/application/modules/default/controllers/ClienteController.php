<?php

class Default_ClienteController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    	$usuario = Zend_Auth::getInstance()->getIdentity();
    	$this->view->usuario = $usuario;
    	$veiculos = new Admin_Model_Veiculo();
    	 
    	$sql = $veiculos->listarVeiculos();
    	$this->view->titulo = 'Veículos disponíveis para locação e venda';
    	$this->view->veiculos = $sql;
    }

    public function solicitaveiculoAction()
    {
        // action body
    	$usuario = Zend_Auth::getInstance()->getIdentity();
    	
    	$usuario->_userId;
    	
    	$form = new Default_Form_SolicitaVeiculo();
    	$model = new Default_Model_Cliente();
    	$modalidade = $this->_getParam('modalidade');
    	$veiculo = $this->_getParam('veiculo');
    	
    	
    	if($form->isValid($this->_request->getPost())){
    		 
    		$data = $form->getValues();
    		if($modalidade){
    			
    			$model->insert($data);
    	
    	
    		}else{
    	
    		}
    		 
    		$this->_redirect('/cliente');
    		 
    	}
    	
    	elseif($modalidade){
    		$data = array('modalidade_servico_id_modalidade'=>$modalidade
    				,'usuario_id_usuario'=>$usuario,'veiculo_id_veiculo'=>$veiculo);
    		if(is_array($data)){
    			$form->setAction('/sga/cliente/solicitavenda/modalidade/' . $modalidade);
    			$form->populate($data);
    		}
    		 
    	}
    	 
    	$this->view->form_alterar_usuario = $form;
    }


}



