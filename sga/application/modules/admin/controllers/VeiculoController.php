<?php

class Admin_VeiculoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    	$form = new Admin_Form_InserirVeiculo();
    	$this->view->form = $form;
    	
    	$veiculo = new Admin_Model_Veiculo();
    	$rows = $veiculo->listar();
    	$this->view->veiculos = $rows;
    }

    public function inserirAction()
    {
        // action body
    	
    	
        $form = new Admin_Form_InserirVeiculo();
        if($this->_request->isPost()){
        	 
        	if($form->isValid($this->_request->getPost())){
        
        
        		$dados = $form->getValues();
        
        		$model = new Admin_Model_Veiculo();
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
    	$form = new Admin_Form_AlteraVeiculo(); 
    	$model = new Admin_Model_Veiculo();
    	$id = $this->_getParam('id');
    	 
    	if($form->isValid($this->_request->getPost())){
    		 
    		$data = $form->getValues();
    		if($id){
    			$where = $model->getAdapter()->quoteInto('Id_Veiculo = ?',$id);
    			$model->update($data,$where);
    			
    			
    		}else{
    	
    		}
    		 
    		$this->_redirect('/admin/veiculo');
    		
    	}
    	
    	elseif($id){
    		$data = $model->busca($id);
    		if(is_array($data)){
    			$form->setAction('/sga/admin/veiculo/alterar/id/' . $id);
    			$form->populate($data);
    		}
    		 
    	}
    	 
    	$this->view->form_alterar_veiculo = $form;
    }

    public function excluirAction()
    {
        // action body
    	$veiculo = new Admin_Model_Veiculo();
    	$id = $this->_getParam('id');
    	$deleta = $veiculo->delete($id);
    	echo "Úlitmo id excluído  = $deleta";
    	$this->_redirect('/veiculo');
    }

    public function uploadAction()
    {
        
    	// Instancia o formulário
    	$form = new Admin_Form_UploadImagemVeiculo();
    	$model = new Admin_Model_Veiculo();
    	$this->view->form = $form;
    	$id = $this->_getParam('id');
    	
  
    if($this->getRequest()->isPost() and $form->isValid($_POST)){
    	
    	//$data = $imageAdapter->getFileName('foto');
    	
    	/*
    */
	$imageAdapter = new Zend_File_Transfer_Adapter_Http();
	$imageAdapter->setDestination('C:\Program Files\Zend\Apache2\htdocs\sga\public\imagem');
	
	
	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
		
		if (!$imageAdapter->receive('foto')){
			$messages = $imageAdapter->getMessages['foto'];
	
			//A Imagem Não Foi Recebida Corretamente
		}else{
			//Arquivo Enviado Com Sucesso
			//Realize As Ações Necessárias Com Os Dados
	
		 
			$filename = $imageAdapter->getFileName('foto');
			$string = $_FILES['foto']['name'];
			$data = array('Foto'=>$string);
			$where = $model->getAdapter()->quoteInto('Id_Veiculo = ?',$id);
			$model->update($data,$where);
			
         
		}
		
		
		
	}else{
		//O Arquivo Não Foi Enviado Corretamente
		
	}
    }
    
    // $this->_redirect('/admin/veiculo');
    }

    
}











