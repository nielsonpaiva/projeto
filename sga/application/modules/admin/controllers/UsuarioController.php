<?php

class Admin_UsuarioController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    	$usuario = new Admin_Model_Usuario();
    	$rows = $usuario->listar();
    	$this->view->usuarios = $rows;
    }

    public function inserirAction()
    {
        // action body
    	$form = new Admin_Form_InserirUsuario();
    	if($this->_request->isPost()){
    	
    		if($form->isValid($this->_request->getPost())){
    	
    	
    			$dados = $form->getValues();
    	
    			$model = new Admin_Model_Usuario();
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
    	$form = new Admin_Form_AlterarUsuario();
    	$model = new Admin_Model_Usuario();
    	$id = $this->_getParam('id');
    	
    	if($form->isValid($this->_request->getPost())){
    		 
    		$data = $form->getValues();
    		if($id){
    			$where = $model->getAdapter()->quoteInto('Id_Usuario = ?',$id);
    			$model->update($data,$where);
    			 
    			 
    		}else{
    			 
    		}
    		 
    		$this->_redirect('/admin/usuario');
    	
    	}
    	 
    	elseif($id){
    		$data = $model->busca($id);
    		if(is_array($data)){
    			$form->setAction('/sga/admin/usuario/alterar/id/' . $id);
    			$form->populate($data);
    		}
    		 
    	}
    	
    	$this->view->form_alterar_usuario = $form;
    }

    public function excluirAction()
    {
        // action body
    	$usuario = new Admin_Model_Usuario();
    	$id = $this->_getParam('id');
    	$excluir = $usuario->excluir($id);
    	$this->_redirect('/admin/usuario');
    }


}







