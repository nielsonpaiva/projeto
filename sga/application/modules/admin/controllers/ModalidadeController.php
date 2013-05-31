<?php

class Admin_ModalidadeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    	$modalidade = new Admin_Model_Modalidade();
    	$res = $modalidade->listar();
    	$this->view->modalidades= $res;
    }

    public function inserirAction()
    {
        // action body
        $form  = new Admin_Form_InserirModalidade();
        if($this->_request->isPost()){
        if($form->isValid($this->_request->getPost())){
        
        
        	$dados = $form->getValues();
        
        	$model = new Admin_Model_Modalidade();
        	$model->inserir($dados);
        
        	//$this->_redirect('localhost/admin/veiculo/inserir');
        	echo "Inserido com sucesso";
        }
        }
     $this->view->form = $form;   
    }

    public function alterarAction()
    {
        // action body
    	$form = new Admin_Form_AlteraModalidade();
    	$model = new Admin_Model_Modalidade();
    	$id = $this->_getParam('id');
    	
    	if($form->isValid($this->_request->getPost())){
    		 
    		$data = $form->getValues();
    		if($id){
    			$where = $model->getAdapter()->quoteInto('Id_Modalidade = ?',$id);
    			$model->update($data,$where);
    			 
    			 
    		}else{
    			 
    		}
    		 
    		$this->_redirect('/admin/modalidade');
    	
    	}
    	 
    	elseif($id){
    		$data = $model->busca($id);
    		if(is_array($data)){
    			$form->setAction('/sga/admin/modalidade/alterar/id/' . $id);
    			$form->populate($data);
    		}
    		 
    	}
    	
    	$this->view->form_alterar_modalidade = $form;
    }

    public function excluirAction()
    {
        // action body
    	$modalidade = new Admin_Model_Modalidade();
    	$id = $this->_getParam('id');
    	$excluir = $modalidade->excluir($id);
    	$this->_redirect('/admin/modalidade');
    }


}







