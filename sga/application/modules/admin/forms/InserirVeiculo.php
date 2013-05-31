<?php

class Admin_Form_InserirVeiculo extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$marca = new Zend_Form_Element_Text('marca');
    	$marca->setLabel('Marca:')
    	->setRequired(true)
    	->setAttrib('size', 40)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$modelo = new Zend_Form_Element_Text('modelo');
    	$modelo->setLabel('Modelo:')
    	->setRequired(true)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	
    	$placa = new Zend_Form_Element_Text('placa');
    	$placa->setLabel('Placa:')
    	->setRequired(true)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
      	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	
    	$cor = new Zend_Form_Element_Text('cor');
    	$cor->setLabel('Cor:')
    	->setRequired(true)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	
    	$cidade = new Zend_Form_Element_Text('cidade');
    	$cidade->setLabel('Cidade:')
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	$preco = new Zend_Form_Element_Text('preco');
    	$preco->setLabel('Preço:')
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$estado = new Zend_Form_Element_Select('estado_id_estado');
    	$estado->setLabel('Estado:')->setRequired(true)
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$model = new Admin_Model_Estado();
    	$rows = $model->carregar();
    	 
    	foreach ($rows as $row){
    		$estado->addMultiOption('','Selecione o estado')
    		->addMultiOption($row['Id_Estado'],$row['Sigla']);
    	
    	}
    	
    	$fornecedor = new Zend_Form_Element_Select('fornecedor_cnpj');
    	$fornecedor->setLabel('Fornecedor:')->setRequired(true)
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	$model = new Admin_Model_Fornecedor();
    	$rows = $model->carregar();
    	
    	foreach ($rows as $row){
    		$fornecedor->addMultiOption('','Selecione o fornecedor')
    		->addMultiOption($row['CNPJ'],$row['Razao_Social']);
    		 
    	}
    	/*
    	$foto = new Zend_Form_Element_File('foto');
    	$foto->setLabel('Escolha a imagem: ')
    	->setRequired(true)
    	->addValidator( new Zend_Validate_File_Extension('jpeg','jpg','gif','png'));*/
    	
    	
    	$submit = new Zend_Form_Element_Submit('Enviar');
    	$submit->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td',
						'colspan'=>'2','align'=>'center')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	$reset = new Zend_Form_Element_Reset('Limpar');
    	$reset->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td',
    					'colspan'=>'2','align'=>'center')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$this->addElements(array($marca,$modelo,$cor,$estado,$cidade,$placa,$fornecedor,$preco,$submit,$reset));
    	
    	$this->setDecorators(array(
    			'FormElements',
    			array(array('data'=>'HtmlTag'),array('tag'=>'table')),
    			'Form'
    	));
    	
    	$this->setAction('/sga/admin/veiculo/inserir');
    	
    }

    
}