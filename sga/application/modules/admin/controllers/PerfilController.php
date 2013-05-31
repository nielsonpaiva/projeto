<?php

class Admin_PerfilController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    	$perfil = new Admin_Model_Perfil();
    	$res = $perfil->listar();
    	$this->view->perfis= $res;
    }

    public function inserirAction()
    {
        // action body
    	$form  = new Admin_Form_InserirPerfil();
    	if($this->_request->isPost()){
    		if($form->isValid($this->_request->getPost())){
    	
    	
    			$dados = $form->getValues();
    	
    			$model = new Admin_Model_Perfil();
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
    	$form = new Admin_Form_AlterarPerfil();
    	$model = new Admin_Model_Perfil();
    	$id = $this->_getParam('id');
    	 
    	if($form->isValid($this->_request->getPost())){
    		 
    		$data = $form->getValues();
    		if($id){
    			$where = $model->getAdapter()->quoteInto('Id_Perfil = ?',$id);
    			$model->update($data,$where);
    	
    	
    		}else{
    	
    		}
    		 
    		$this->_redirect('/admin/perfil');
    		 
    	}
    	
    	elseif($id){
    		$data = $model->busca($id);
    		if(is_array($data)){
    			$form->setAction('/sga/admin/perfil/alterar/id/' . $id);
    			$form->populate($data);
    		}
    		 
    	}
    	 
    	$this->view->form_alterar_perfil = $form;
    }

    public function excluirAction()
    {
        // action body
    	$perfil = new Admin_Model_Perfil();
    	$id = $this->_getParam('id');
    	$excluir = $perfil->excluir($id);
    	$this->_redirect('/admin/perfil');
    }


}







