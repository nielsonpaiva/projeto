<?php

class Admin_FornecedorController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
    	$fornecedor = new Admin_Model_Fornecedor();
    	$res = $fornecedor->listar();
    	$this->view->fornecedores = $res;
 
    }

    public function inserirAction()
    {
        // action body
        $form = new Admin_Form_InserirFornecedor();
        
        if($this->_request->isPost()){
        
        	if($form->isValid($this->_request->getPost())){
        
        
        		$dados = $form->getValues();
        
        		$model = new Admin_Model_Fornecedor();
        		$model->insert($dados);
        
        		//$this->_redirect('localhost/admin/veiculo/inserir');
        		echo "Inserido com sucesso";
        	}
        }
        
        $this->view->form = $form;
    }

    public function alterarAction()
    {
        // action body
        $form = new Admin_Form_AlteraFornecedor();
        $model = new Admin_Model_Fornecedor();
        $id = $this->_getParam('id');
    	 
    	if($form->isValid($this->_request->getPost())){
    		 
    		$data = $form->getValues();
    		if($id){
    			$where = $model->getAdapter()->quoteInto('CNPJ = ?',$id);
    			$model->update($data,$where);
    			
    			
    		}else{
    	
    		}
    		 
    		$this->_redirect('/admin/fornecedor');
    		
    	}
    	
    	elseif($id){
    		$data = $model->busca($id);
    		if(is_array($data)){
    			$form->setAction('/sga/admin/fornecedor/alterar/id/' . $id);
    			$form->populate($data);
    		}
    		 
    	}
    	 
    	$this->view->form_alterar_fornecedor = $form;
    }

    public function excluirAction()
    {
        // action body
        $fornecedor = new Admin_Model_Fornecedor();
        $id = $this->_getParam('id');
        $excluir = $fornecedor->excluir($id);
        $this->_redirect('/admin/fornecedor');
    }


}







